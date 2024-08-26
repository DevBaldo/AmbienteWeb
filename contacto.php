<?php
$title = "Adopciones - Clínica Veterinaria";
include 'header.php';
?>

    <section>
            <h2>Formulario de Contacto</h2>
            <form id="contacto-form" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" pattern="[A-Za-z\s]+" required>
                    <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
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
                <button type="submit" class="btn btn-primary">Enviar</button>
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

<?php include 'footer.php'; ?>