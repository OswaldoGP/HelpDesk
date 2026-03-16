<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <title>Help-Desk</title>
</head>
<body>
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="inicio.php">
            <img src="../public/img/logoicono.ico" width="30%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="inicio.php">
                    <span class="fas fa-home"> </span>    inicio
                </a>
            </li>
        <?php if($_SESSION['usuario']['rol'] == 1){  ?>
            <li class="nav-item">
                <a class="nav-link" href="misDispositivos.php">
                    <span class="fas fa-hdd"></span>    Mis dispositivos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misReportes.php">
                    <span class="fas fa-file"></span>    Reportes soportes
                </a>
            </li>
        <?php } else if($_SESSION['usuario']['rol'] == 2) {  ?>

            <!-- vistas del admim (root) -->

            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                <span class="fas fa-users"></span> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="asignacion.php">
                    <span  class="fas fa-hand-holding"></span> Asignacion
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reportes.php">
                    <span  class="fas fa-folder-open"></span> reportes
                </a>
            </li>
        <?php } ?>
            <li class="nav-item dropdown" >
                <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-user-circle"></span> Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="nabvarDropdown">
                <a class="dropdown-item" href="#" 
                data-toggle="modal" 
                data-target="#modalActualizarDatosPersonales"
                onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
                    <span class="fas fa-user-edit"></span> Editar datos 
                </a>
                <div class="dropdown-divider"></div>  
                <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                    <span class="fas fa-sign-out-alt"></span> Salir
                </a>
            
            </li>
        </ul>
        </div>
    </div>
</nav>

    <?php 
        include "inicio/modalActualizarDatosPersonales.php";
    ?>
