<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Clínica Veterinaria</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <script src="JS/validation.js"></script>
</head>
<body>
    <header>
        <h1>Contacto</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="citas.php">Sistema de Citas</a></li>
                <li><a href="emergencia.php">Módulo de Emergencia</a></li>
                <li><a href="adopciones.php">Adopciones</a></li>
                <li><a href="historial.php">Historial Clínico</a></li>
                <li><a href="cuidados.php">Cuidado de Mascotas</a></li>
                <li><a href="servicios.php">Servicios para Mascotas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Formulario de Contacto</h2>
            <form id="contacto-form" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingrese el asunto.</div>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" required></textarea>
                    <div class="invalid-feedback">Por favor, ingrese su mensaje.</div>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </section>
        <section>
            <h2>Información de Contacto</h2>
            <p>Si tienes alguna pregunta, no dudes en contactarnos:</p>
            <ul>
                <li>Teléfono: 8888-8888</li>
                <li>Email: contacto@clinicaveterinaria.com</li>
                <li>Dirección: Calle 123, Heredia, Costa Rica</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Clínica Veterinaria. Todos los derechos reservados.</p>
    </footer>
</body>
</html>