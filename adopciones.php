<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopciones - Clínica Veterinaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS\styles.css">
</head>
<body>
<header class="bg-dark text-white p-3 text-center">
        <h1>Sistema de Adopciones</h1>
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
        <section class="adopciones">
            <h2>Animales en Adopción</h2>
            <p>A continuación se muestran los animales disponibles para adopción:</p>
            <ul>
                <li>Perro Labrador</li>
                <li>Gato Siames</li>
                <!-- Simulacion de animales -->
            </ul>
            <h3>Pasos para el Proceso de Adopción</h3>
            <ol>
                <li>Visita la clínica para conocer al animal.</li>
                <li>Llena el formulario de adopción.</li>
                <li>Espera la confirmación del proceso.</li>
            </ol>
            <form id="citas-form" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre del adoptante:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required>
                <div class="invalid-feedback">Por favor, ingrese un nombre valido.</div>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <div class="invalid-feedback">Por favor, ingrese un correo electrónico valido.</div>
            </div>
            <div class="form-group">
                <label for="telefono">Número:</label>
                <input type="tel" id="telefono" name="telefono" required>
                <div class="invalid-feedback">Por favor, ingrese una fecha valida.</div>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="4" required></textarea>
                <div class="invalid-feedback">Por favor, ingrese un comentario.</div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
            <div id="mensaje"></div>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Clínica Veterinaria. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
