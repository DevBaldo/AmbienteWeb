<?php
$title = "Sistema de Citas - Clínica Veterinaria";
include 'header.php';
include 'db.php';

// Obtener todas las citas de todos los clientes
$query = "SELECT C.fecha_hora, C.motivo, M.nombre AS mascota_nombre, CL.nombre AS cliente_nombre
          FROM Citas C
          JOIN Mascotas M ON C.id_mascota = M.id_mascota
          JOIN Clientes CL ON C.id_cliente = CL.id_cliente
          ORDER BY C.fecha_hora DESC";
$result = $conn->query($query);
?>

<main class="container my-4">
<h2>Programa tu Cita</h2>
    <form id="citas-form" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required>
            <div class="invalid-feedback">Por favor, ingrese un nombre válido.</div>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
            <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            <div class="invalid-feedback">Por favor, ingrese una fecha válida.</div>
        </div>
        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
            <div class="invalid-feedback">Por favor, ingrese una hora válida.</div>
        </div>
        <div class="form-group">
            <label for="mascota">Mascota:</label>
            <select class="form-control" id="mascota" name="mascota" required>
                <option value="">Seleccione una mascota</option>
                <?php foreach ($mascotas as $mascota): ?>
                    <option value="<?php echo $mascota['id_mascota']; ?>"><?php echo $mascota['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Por favor, seleccione una mascota.</div>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios:</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="4" required></textarea>
            <div class="invalid-feedback">Por favor, ingrese un comentario.</div>
        </div>
        <button type="submit" class="btn btn-primary">Agendar Cita</button>
    </form>

    <hr>

    <h2>Citas Programadas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre del Cliente</th>
                <th>Nombre de la Mascota</th>
                <th>Fecha y Hora</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['cliente_nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['mascota_nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['fecha_hora']) . '</td>';
                echo '<td>' . htmlspecialchars($row['motivo']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</main>

<?php include 'footer.php'; ?>

<script>
document.getElementById('citas-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    fetch('agendar_cita.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert('Cita agendada con éxito');
        form.reset();
        // Opcional: Recargar la página para actualizar el formulario o la lista de citas
        // window.location.reload();
    })
    .catch(error => console.error('Error:', error));
});
</script>