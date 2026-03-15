-- inner joins


SELECT 
    usuarios.id_usuario AS idUsuario,
    usuarios.usuario AS nombreUsuario,
    roles.nombre AS rol,
    usuarios.id_rol AS idRol,
    usuarios.ubicacion AS ubicacion,
    usuarios.activo AS estatus,
    usuarios.id_persona AS idPersona,
    persona.nombre AS nombrePersona,
    persona.paterno AS paterno,
    persona.materno AS materno,
    persona.fecha_nacimiento AS fechaNacimiento,
    persona.sexo AS sexo,
    persona.correo AS correo,
    persona.telefono AS telefono
FROM
    t_usuarios AS usuarios
        INNER JOIN
    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
        INNER JOIN
    t_persona AS persona ON usuarios.id_persona = persona.id_persona
        AND usuarios.id_usuario = 3;






-- sacar id de persona
SELECT 
    persona.id_persona AS idPersona
FROM
    t_usuarios AS usuarios
        INNER JOIN
    t_persona AS persona ON usuarios.id_persona = persona.id_persona
        AND usuarios.id_usuario = 1;

--  tabla catalogo
CREATE TABLE `t_cat_equipo` (
    `id_equipo` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(245) NOT NULL,
    `descripcion` VARCHAR(245) NULL,
    PRIMARY KEY (`id_equipo`));


--- persona y id
SELECT 
	id_persona,
    CONCAT(paterno, ' ', materno, ' ', nombre) AS nombre
FROM
    t_persona;


-- clientes
SELECT 
    persona.id_persona,
    CONCAT(persona.paterno,
            ' ',
            persona.materno,
            ' ',
            persona.nombre) AS nombrePersona
FROM
    t_persona AS persona
        INNER JOIN
    t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
        AND usuario.id_rol = 1
ORDER BY persona.paterno


-- tabla de asignacion 
CREATE TABLE `t_asignacion` (
  `id_asignacion` INT NOT NULL,
  `id_persona` INT NOT NULL,
  `id_equipo` INT NOT NULL,
  `marca` VARCHAR(245) NULL,
  `modelo` VARCHAR(245) NULL,
  `color` VARCHAR(245) NULL,
  `descripcion` VARCHAR(245) NULL,
  `memoria` VARCHAR(245) NULL,
  `disco_duro` VARCHAR(245) NULL,
  `procesador` VARCHAR(245) NULL,
  PRIMARY KEY (`id_asignacion`));


  ALTER TABLE `helpdesk`.`t_asignacion` 
ADD INDEX `fkPersona_idx` (`id_persona` ASC) VISIBLE,
ADD INDEX `fkequipoAsignacion_idx` (`id_equipo` ASC) VISIBLE;
;
ALTER TABLE `helpdesk`.`t_asignacion` 
ADD CONSTRAINT `fkPersonaAsignacion`
  FOREIGN KEY (`id_persona`)
  REFERENCES `helpdesk`.`t_persona` (`id_persona`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fkequipoAsignacion`
  FOREIGN KEY (`id_equipo`)
  REFERENCES `helpdesk`.`t_cat_equipo` (`id_equipo`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;





--- asignaciones de productos a usuarios 

SELECT 
	persona.id_persona,
    CONCAT(persona.paterno,
			' ',
            persona.materno,
            ' ',
            persona.nombre) AS nombrePersona,
	equipo.id_equipo AS idEquipo,
    equipo.nombre as nombreEquipo,
    asignacion.id_asignacion as idAsignacion,
    asignacion.marca,
	asignacion.modelo,
    asignacion.color,
    asignacion.descripcion,
    asignacion.memoria,
    asignacion.disco_duro,
    asignacion.procesador
FROM
	t_asignacion AS asignacion
    INNER JOIN 
    t_persona AS persona ON asignacion.id_persona = persona.id_persona
    INNER JOIN
    t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo;
	




--- tabla nueva de reportes 

CREATE TABLE `helpdesk`.`t_reportes` (
  `id_reporte` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NULL,
  `id_equipo` INT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id_reporte`),
  INDEX `fkUsuarioReporte_idx` (`id_usuario` ASC) VISIBLE,
  INDEX `fkEquipoReporte_idx` (`id_equipo` ASC) VISIBLE,
  CONSTRAINT `fkUsuarioReporte`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `helpdesk`.`t_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkEquipoReporte`
    FOREIGN KEY (`id_equipo`)
    REFERENCES `helpdesk`.`t_cat_equipo` (`id_equipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- mas campos de reportes, estado, id del quien solocuino etc
ALTER TABLE `helpdesk`.`t_reportes` 
DROP FOREIGN KEY `fkEquipoReporte`,
DROP FOREIGN KEY `fkUsuarioReporte`;
ALTER TABLE `helpdesk`.`t_reportes` 
ADD COLUMN `id_usuario_tecnico` INT NULL AFTER `id_equipo`,
ADD COLUMN `solucion_problema` TEXT NULL AFTER `descripcion_problema`,
ADD COLUMN `estatus` INT NOT NULL AFTER `solucion_problema`,
CHANGE COLUMN `id_usuario` `id_usuario` INT NOT NULL COMMENT '	' ,
CHANGE COLUMN `id_equipo` `id_equipo` INT NOT NULL ,
CHANGE COLUMN `descripcion` `descripcion_problema` TEXT NOT NULL ;
ALTER TABLE `helpdesk`.`t_reportes` 
ADD CONSTRAINT `fkEquipoReporte`
  FOREIGN KEY (`id_equipo`)
  REFERENCES `helpdesk`.`t_cat_equipo` (`id_equipo`),
ADD CONSTRAINT `fkUsuarioReporte`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `helpdesk`.`t_usuarios` (`id_usuario`);


-- productos de una persona
SELECT 
    asignacion.id_asignacion,
    equipo.id_equipo,
    equipo.nombre
FROM
    t_asignacion AS asignacion
        INNER JOIN
    t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo
WHERE
	asignacion.id_persona = (SELECT
								id_persona
							FROM
								t_usuarios
							WHERE
								id_usuario = 1);