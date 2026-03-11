<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <title>Help-Desk</title>
</head>
<body>
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="inicio.php">Help - Desk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="inicio.php">inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misDispositivos.php">Mis dispositivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misReportes.php">Reportes soportes</a>
            </li>
            <!-- vistas del admim (root) -->
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="asignacion.php">Asignacion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reportes.php">reportes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
                </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Editar datos </a></li>
                <li><hr class="dropdown-divider"></li>   
                <li><a class="dropdown-item" href="#">Salir</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>