<?php
include 'functions.php'; // Incluye las funciones necesarias y la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animal_id = intval($_POST['animal_id']);

    // Validar que el ID del animal sea válido
    if ($animal_id > 0) {
        // Obtener la información del animal a adoptar
        $stmt = $conn->prepare("SELECT nombre, tipo_animal, raza FROM animales_disponibles WHERE id = ?");
        $stmt->bind_param("i", $animal_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $animal = $result->fetch_assoc();
        $stmt->close();

        if ($animal) {
            // Insertar la adopción en la tabla 'adopciones'
            $stmt_insert = $conn->prepare("INSERT INTO adopciones (nombre_animal, tipo_animal, raza, estado) VALUES (?, ?, ?, 'Pendiente')");
            $stmt_insert->bind_param("sss", $animal['nombre'], $animal['tipo_animal'], $animal['raza']);

            if ($stmt_insert->execute()) {
                // Eliminar el animal de la tabla 'animales_disponibles' ya que ha sido adoptado
                $stmt_delete = $conn->prepare("DELETE FROM animales_disponibles WHERE id = ?");
                $stmt_delete->bind_param("i", $animal_id);
                $stmt_delete->execute();
                $stmt_delete->close();

                echo "<script>
                    alert('¡Adopción exitosa! Gracias por adoptar a uno de nuestros animales.');
                    window.location.href = 'adopciones.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error al registrar la adopción. Por favor, intenta nuevamente.');
                    window.location.href = 'adopciones.php';
                </script>";
            }

            $stmt_insert->close();
        } else {
            echo "<script>
                alert('Animal no encontrado. Por favor, intenta nuevamente.');
                window.location.href = 'adopciones.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('ID de animal no válido.');
            window.location.href = 'adopciones.php';
        </script>";
    }
} else {
    header("Location: adopciones.php");
    exit;
}

$conn->close();
?>

