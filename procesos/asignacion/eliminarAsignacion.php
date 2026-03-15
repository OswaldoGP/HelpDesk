<?php
    $idAsignacion = $_POST['IdAsignacion'];

    include "../../clases/Asignacion.php";
    $Asignacion = new  Asignacion();

    echo $Asignacion->eliminarAsignacion($idAsignacion);

