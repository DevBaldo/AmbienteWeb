<?php
$title = "Adopciones - Clínica Veterinaria";
include 'header.php';
?>

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
    
<?php include 'footer.php'; ?>
