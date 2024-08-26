<?php
// Incluye la conexión a la base de datos
include 'db.php';

// Consulta para obtener las mascotas disponibles
$query = "SELECT id_mascota, nombre, especie FROM Mascotas WHERE estado_adopcion = 'Disponible'";
$result = mysqli_query($conn, $query);

$mascotas = array();
while ($row = mysqli_fetch_assoc($result)) {
    $mascotas[] = $row;
}

// Cierra la conexión
mysqli_close($conn);

// Devuelve los datos como JSON
header('Content-Type: application/json');
echo json_encode($mascotas);
?>
