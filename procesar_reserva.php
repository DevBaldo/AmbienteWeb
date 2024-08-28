<?php
include 'db.php'; // Incluye la conexión a la base de datos

// Comprobar si el formulario fue enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre_usuario = htmlspecialchars(trim($_POST['nombre']));
    $mascota_id = htmlspecialchars(trim($_POST['mascota']));
    $fecha_reserva = htmlspecialchars(trim($_POST['fecha']));
    $servicio_id = htmlspecialchars(trim($_POST['servicio']));

    // Validar que todos los campos del formulario están completos
    if (!empty($nombre_usuario) && !empty($mascota_id) && !empty($fecha_reserva) && !empty($servicio_id)) {
        // Comprobar si ya existe una reserva para la misma fecha y hora
        $check_query = $conn->prepare("SELECT * FROM reservas WHERE fecha_reserva = ? AND servicio_id = ?");
        $check_query->bind_param("si", $fecha_reserva, $servicio_id);
        $check_query->execute();
        $result = $check_query->get_result();

        if ($result->num_rows > 0) {
            // Mostrar un mensaje de error si ya existe una reserva en la misma fecha y hora
            echo "<script>
                alert('Lo sentimos, ya existe una reserva para esa fecha y hora. Por favor, elija otra.');
                window.location.href = 'reservas.php';
            </script>";
        } else {
            // Preparar la consulta SQL para insertar la reserva en la base de datos
            $stmt = $conn->prepare("INSERT INTO reservas (nombre_usuario, mascota_id, servicio_id, fecha_reserva) VALUES (?, ?, ?, ?)");

            if ($stmt) {
                // Vincular los parámetros y ejecutar la consulta
                $stmt->bind_param("siis", $nombre_usuario, $mascota_id, $servicio_id, $fecha_reserva);

                if ($stmt->execute()) {
                    // Mostrar un mensaje de éxito utilizando JavaScript
                    echo "<script>
                        alert('Tu reserva ha sido realizada con éxito.');
                        window.location.href = 'reservas.php';
                    </script>";
                } else {
                    // Mostrar un mensaje de error utilizando JavaScript
                    echo "<script>
                        alert('Error al realizar la reserva: " . $stmt->error . "');
                        window.location.href = 'reservas.php';
                    </script>";
                }

                // Cerrar la declaración
                $stmt->close();
            } else {
                // Mostrar un mensaje de error utilizando JavaScript
                echo "<script>
                    alert('Error al preparar la consulta: " . $conn->error . "');
                    window.location.href = 'reservas.php';
                </script>";
            }
        }

        // Cerrar la declaración de verificación
        $check_query->close();
    } else {
        // Mostrar un mensaje de error utilizando JavaScript
        echo "<script>
            alert('Por favor, complete todos los campos del formulario.');
            window.location.href = 'reservas.php';
        </script>";
    }
} else {
    // Redirigir a la página de reservas si se intenta acceder a esta página sin enviar el formulario
    echo "<script>
        window.location.href = 'reservas.php';
    </script>";
}

// Cerrar la conexión
$conn->close();
?>