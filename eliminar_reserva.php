<?php
include 'functions.php'; // Incluye las funciones necesarias

// Comprobar si se ha pasado un ID válido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Eliminar la reserva de la base de datos
    if (deleteReserva($id)) {
        echo "<script>
            alert('Reserva eliminada con éxito.');
            window.location.href = 'ver_reservas.php';
        </script>";
    } else {
        echo "<script>
            alert('Error al eliminar la reserva.');
            window.location.href = 'ver_reservas.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID de reserva no válido.');
        window.location.href = 'ver_reservas.php';
    </script>";
}

$conn->close();
?>