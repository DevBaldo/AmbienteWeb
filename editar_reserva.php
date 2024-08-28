<?php
include 'functions.php'; // Incluye las funciones necesarias

// Comprobar si se ha pasado un ID válido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $reserva = getReservaById($id); // Obtener la reserva actual por ID

    // Verificar si la reserva es modificable
    if (!esReservaModificable($reserva['fecha_reserva'])) {
        echo "<script>
            alert('No se pueden modificar reservas viejas.');
            window.location.href = 'ver_reservas.php';
        </script>";
        exit;
    }

    // Procesar la edición de la reserva
    procesarEdicionReserva($id);
} else {
    echo "<script>
        alert('ID de reserva no válido.');
        window.location.href = 'ver_reservas.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Reserva - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/scriptvjquery.js"></script>
</head>

<body>
    <header>
        <h1>Editar Reserva</h1>
    </header>
    <main class="center-container">
        <?php if ($reserva): ?>
        <form method="post" action="">
            <label for="nombre_usuario">Nombre del Usuario:</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo $reserva['nombre_usuario']; ?>" required>

            <label for="mascota_id">Nombre de la Mascota:</label>
            <select name="mascota_id" id="mascota_id" required>
                <?php
                $mascotas = getMascotas(); // Asegúrate de tener esta función para obtener mascotas
                foreach ($mascotas as $mascota) {
                    $selected = ($mascota['id'] == $reserva['mascota_id']) ? 'selected' : '';
                    echo "<option value='{$mascota['id']}' $selected>{$mascota['nombre']}</option>";
                }
                ?>
            </select>

            <label for="servicio_id">Servicio:</label>
            <select name="servicio_id" id="servicio_id" required>
                <?php
                $servicios = getServicios(); 
                foreach ($servicios as $servicio) {
                    $selected = ($servicio['id'] == $reserva['servicio_id']) ? 'selected' : '';
                    echo "<option value='{$servicio['id']}' $selected>{$servicio['nombre']}</option>";
                }
                ?>
            </select>

            <label for="fecha_reserva">Fecha de Reserva:</label>
            <input type="datetime-local" name="fecha_reserva" id="fecha_reserva" value="<?php echo date('Y-m-d\TH:i', strtotime($reserva['fecha_reserva'])); ?>" required>

            <button type="submit">Actualizar Reserva</button>
        </form>
        <?php else: ?>
            <p>Reserva no encontrada.</p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>