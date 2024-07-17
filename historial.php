<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Clínico - Clínica Veterinaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS\styles.css">
</head>
<body>
<header class="bg-dark text-white p-3 text-center">
        <h1>Historial Clinico</h1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="citas.php">Sistema de Citas</a></li>
                <li class="nav-item"><a class="nav-link" href="emergencias.php">Emergencias</a></li>
                <li class="nav-item"><a class="nav-link" href="Adopciones.php">Adopciones</a></li>
                <li class="nav-item"><a class="nav-link" href="historial.php">Historial Clinico</a></li>
                <li class="nav-item"><a class="nav-link" href="cuidados.php">Cuidado de mascotas</a></li>
                <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios para mascotas</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="historial">
            <h2>Buscar Historial Clínico por ID</h2>
            <form id="historialForm" action="buscar_historial.php" method="GET">
                <label for="id">ID del Paciente:</label>
                <input type="text" id="id" name="id" required><br><br>
                
                <button type="submit">Buscar Historial</button>
            </form>
            <div id="resultado"></div>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Clínica Veterinaria. Todos los derechos reservados.</p>
    </footer>
</body>
</html>