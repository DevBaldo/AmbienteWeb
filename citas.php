<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citas - Veterinaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS\styles.css">
    <script src="JS\script.js" defer></script>
</head>
<body>
    <header class="bg-dark text-white p-3 text-center">
        <h1>Sistema de Gestión de Citas</h1>
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
    <main class="container my-4">
        <h2>Programa tu Cita</h2>
        <form id="citas-form" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required>
                <div class="invalid-feedback">Por favor, ingrese un nombre valido.</div>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <div class="invalid-feedback">Por favor, ingrese un correo electrónico valido.</div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
                <div class="invalid-feedback">Por favor, ingrese una fecha valida.</div>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
                <div class="invalid-feedback">Por favor, ingrese una hora valida.</div>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="4" required></textarea>
                <div class="invalid-feedback">Por favor, ingrese un comentario.</div>
            </div>
            <button type="submit" class="btn btn-primary">Agendar Cita</button>
        </form>
    </main>
    <footer class="bg-dark text-white text-center p-3">
        <p>&copy; 2024 Veterinaria. Todos los derechos reservados.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
