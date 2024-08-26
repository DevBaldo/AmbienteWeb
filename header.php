<?php
session_start();
$isLoggedIn = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<header class="bg-dark text-white p-3 text-center">
    <h1>Clínica Veterinaria</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="citas.php">Sistema de Citas</a></li>
            <li class="nav-item"><a class="nav-link" href="emergencias.php">Emergencias</a></li>
            <li class="nav-item"><a class="nav-link" href="adopciones.php">Adopciones</a></li>
            <li class="nav-item"><a class="nav-link" href="historial.php">Historial Clínico</a></li>
            <li class="nav-item"><a class="nav-link" href="cuidados.php">Cuidado de Mascotas</a></li>
            <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios para Mascotas</a></li>
            <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['admin'])): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Ingresar</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
