<?php
include 'functions.php'; // Incluye las funciones necesarias y la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nombre_animal = htmlspecialchars($_POST['nombre_animal']);
    $tipo_animal = htmlspecialchars($_POST['tipo_animal']);
    $raza = htmlspecialchars($_POST['raza']);

    // Validar que el ID de la adopción sea válido
    if ($id > 0) {
        // Eliminar la adopción y restaurar el animal a la tabla 'animales_disponibles'
        if (eliminarAdopcionYRestaurarAnimal($id, $nombre_animal, $tipo_animal, $raza)) {
            echo "<script>
                alert('Adopción eliminada y animal restaurado con éxito.');
                window.location.href = 'ver_adopciones.php';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar la adopción. Por favor, intenta nuevamente.');
                window.location.href = 'ver_adopciones.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('ID de adopción no válido.');
            window.location.href = 'ver_adopciones.php';
        </script>";
    }
} else {
    header("Location: ver_adopciones.php");
    exit;
}
?>


