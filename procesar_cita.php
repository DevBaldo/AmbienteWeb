<?php

include 'db.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
    $hora = mysqli_real_escape_string($conn, $_POST['hora']);
    $mascota = mysqli_real_escape_string($conn, $_POST['mascota']);
    $comentarios = mysqli_real_escape_string($conn, $_POST['comentarios']);


    $query = "INSERT INTO Citas (id_cliente, id_mascota, fecha_hora, motivo) VALUES 
              ((SELECT id_cliente FROM Clientes WHERE email = '$email'), '$mascota', '$fecha $hora', '$comentarios')";
    
    if (mysqli_query($conn, $query)) {
        $response['status'] = 'success';
        $response['message'] = 'Cita agendada con éxito.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error al agendar la cita: ' . mysqli_error($conn);
    }


    mysqli_close($conn);
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de solicitud no válido.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
