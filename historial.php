<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Clínico - Clínica Veterinaria</title>
    <link rel="stylesheet" href="CSS\styles.css">
</head>
<body>
    <header>
        <h1>Historial Clínico</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="citas.php">Sistema de Citas</a></li>
                <li><a href="emergencia.php">Módulo de Emergencia</a></li>
                <li><a href="adopciones.php">Sección de Adopciones</a></li>
                <li><a href="cuidados.php">Cuidado de Mascotas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
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