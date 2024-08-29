<?php 
include("db.php");
function getMenu(){
    session_start();
    $menu = array(
        array("url" => "index.php", "name" => "Inicio")
    );

    if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] == "") {
        // Si el usuario no ha iniciado sesión, mostramos la opción "Nosotros"
        $menu[] = array("url" => "nosotros.php", "name" => "Nosotros");
        $menu[] = array("url" => "servicios.php", "name" => "Servicios");
    }

    $menu[] = array("url" => "reservas.php", "name" => "Reservas");
    $menu[] = array("url" => "adopciones.php", "name" => "Adopciones");

    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "") {
        // Usuario ha iniciado sesión, agregar opciones adicionales
        $menu[] = array("url" => "ver_reservas.php", "name" => "Ver Reservas");
        $menu[] = array("url" => "ver_adopciones.php", "name" => "Ver Adopciones");
        $menu[] = array("url" => "historial.php", "name" => "Historial Medico");
        $menu[] = array("url" => "recomendaciones.php", "name" => "Recomendaciones");
        $menu[] = array("url" => "salir.php", "name" => "Salir");
    } else { 
        // Usuario no ha iniciado sesión, mostrar opción de contacto y de inicio de sesión
        $menu[] = array("url" => "contacto.php", "name" => "Contacto");
        $menu[] = array("url" => "ingresar.php", "name" => "Inicio sesión");
    }

    return $menu;
}

// Función para obtener una mascota por su nombre
function getMascotaByName($nombre_mascota) {
    global $conn;

    // Preparar la consulta SQL
    $query = "SELECT * FROM mascotas WHERE nombre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nombre_mascota);
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();
    $mascota = $result->fetch_assoc();

    // Cerrar el statement y devolver la mascota encontrada
    $stmt->close();
    return $mascota;
}

// Función para obtener el historial clínico de una mascota por su ID
function getHistorialClinicoByMascotaId($mascota_id) {
    global $conn;

    // Preparar la consulta SQL
    $query = "SELECT hc.id, hc.fecha_reserva, s.nombre AS nombre_servicio 
              FROM historial_clinico hc
              JOIN servicios s ON hc.servicio_id = s.id
              WHERE hc.mascota_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $mascota_id);
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $historialClinico = $result->fetch_all(MYSQLI_ASSOC);

    // Cerrar el statement y devolver el historial clínico
    $stmt->close();
    return $historialClinico;
}

// Función para obtener los servicios de la base de datos
function getServicios() {
    
    global $conn; 

    try {
        // Preparar la consulta SQL para obtener los servicios
        $query = "SELECT id, nombre, precio FROM servicios";
        $result = $conn->query($query);

        // Verificar si la consulta tuvo éxito
        if ($result->num_rows > 0) {
            // Obtener todos los resultados como un array asociativo
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Retornar un array vacío si no hay resultados
        }
    } catch (Exception $e) {
        echo "Error al obtener los servicios: " . $e->getMessage();
        return [];
    }
}

// Función para obtener los nombres de las mascotas de la base de datos
function getMascotas() {
    global $conn;

    $query = "SELECT id, nombre FROM mascotas";
    $result = $conn->query($query);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error al obtener las mascotas: " . $conn->error;
        return [];
    }
}

// Función para obtener todas las reservas de la base de datos
function getReservas() {
    global $conn; // Utiliza la conexión a la base de datos ya existente

    try {
        // Consulta SQL para obtener todas las reservas con los detalles de las mascotas y servicios
        $query = "SELECT reservas.id, reservas.nombre_usuario, mascotas.nombre AS nombre_mascota, servicios.nombre AS nombre_servicio, reservas.fecha_reserva 
                  FROM reservas 
                  JOIN mascotas ON reservas.mascota_id = mascotas.id 
                  JOIN servicios ON reservas.servicio_id = servicios.id";
        $result = $conn->query($query);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC); // Devuelve todas las filas como un array asociativo
        } else {
            throw new Exception("Error al obtener las reservas: " . $conn->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        return [];
    }
}


// Función para obtener una reserva específica por ID
function getReservaById($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT reservas.id, reservas.nombre_usuario, reservas.mascota_id, reservas.servicio_id, reservas.fecha_reserva,
                                   mascotas.nombre AS nombre_mascota, servicios.nombre AS nombre_servicio
                            FROM reservas
                            JOIN mascotas ON reservas.mascota_id = mascotas.id
                            JOIN servicios ON reservas.servicio_id = servicios.id
                            WHERE reservas.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $reserva = $result->fetch_assoc();
    $stmt->close();
    return $reserva;
}

// Función para actualizar una reserva en la base de datos
function updateReserva($id, $nombre_usuario, $mascota_id, $servicio_id, $fecha_reserva) {
    global $conn;
    $stmt = $conn->prepare("UPDATE reservas SET nombre_usuario = ?, mascota_id = ?, servicio_id = ?, fecha_reserva = ? WHERE id = ?");
    $stmt->bind_param("siisi", $nombre_usuario, $mascota_id, $servicio_id, $fecha_reserva, $id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Error al actualizar la reserva: " . $stmt->error;
        $stmt->close();
        return false;
    }
}

function deleteReserva($id) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM reservas WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
// Función para verificar si hay un conflicto de horario con otra reserva
function checkReservaConflict($id, $fecha_reserva, $servicio_id) {
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM reservas WHERE fecha_reserva = ? AND servicio_id = ? AND id != ?");
    $stmt->bind_param("sii", $fecha_reserva, $servicio_id, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    return $row['total'] > 0; // Devuelve true si hay un conflicto
}

// Función para manejar la edición de una reserva
function handleReservaEdit($id) {
    // Validar el ID de la reserva
    if (!$id) {
        echo "<script>
            alert('ID de reserva no válido.');
            window.location.href = 'ver_reservas.php';
        </script>";
        exit;
    }

    $reserva = getReservaById($id); // Obtener la reserva actual por ID

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre_usuario = htmlspecialchars(trim($_POST['nombre_usuario']));
        $mascota_id = intval($_POST['mascota_id']);
        $servicio_id = intval($_POST['servicio_id']);
        $fecha_reserva = htmlspecialchars(trim($_POST['fecha_reserva']));

        // Comprobar si hay conflicto de horario con otra reserva
        if (checkReservaConflict($id, $fecha_reserva, $servicio_id)) {
            echo "<script>
                alert('Error: Ya existe una reserva para este servicio en la fecha y hora seleccionadas.');
                window.location.href = 'editar_reserva.php?id=$id';
            </script>";
        } else {
            // Actualizar la reserva en la base de datos
            if (updateReserva($id, $nombre_usuario, $mascota_id, $servicio_id, $fecha_reserva)) {
                echo "<script>
                    alert('Reserva actualizada con éxito.');
                    window.location.href = 'ver_reservas.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error al actualizar la reserva.');
                    window.location.href = 'editar_reserva.php?id=$id';
                </script>";
            }
        }
    }

    return $reserva;
}

// Función para obtener el historial clínico de una mascota
function getHistorialClinico($mascota_id) {
    global $conn;

    $stmt = $conn->prepare("SELECT reservas.id AS reserva_id, mascotas.nombre AS nombre_mascota, 
                                   reservas.fecha_reserva, servicios.nombre AS nombre_servicio 
                            FROM historial_clinico
                            JOIN reservas ON historial_clinico.reserva_id = reservas.id
                            JOIN mascotas ON historial_clinico.mascota_id = mascotas.id
                            JOIN servicios ON historial_clinico.servicio_id = servicios.id
                            WHERE historial_clinico.mascota_id = ?");
    $stmt->bind_param("i", $mascota_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $historial = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $historial;
}

// Función para verificar si una reserva es del año actual y del mes actual o meses futuros
function esReservaModificable($fecha_reserva) {
    $fecha_reserva_dt = new DateTime($fecha_reserva);
    $fecha_actual = new DateTime();

    // Obtener el año y mes actuales
    $anio_actual = $fecha_actual->format('Y');
    $mes_actual = $fecha_actual->format('m');

    // Obtener el año y mes de la reserva
    $anio_reserva = $fecha_reserva_dt->format('Y');
    $mes_reserva = $fecha_reserva_dt->format('m');

    // Verificar si la reserva es del año actual y del mes actual o meses futuros
    if ($anio_reserva > $anio_actual) {
        return true; // Año futuro
    } elseif ($anio_reserva == $anio_actual && $mes_reserva >= $mes_actual) {
        return true; // Año actual y mes actual o futuros
    } else {
        return false; // Año anterior o mes anterior
    }
}

// Función para procesar la edición de una reserva
function procesarEdicionReserva($id) {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre_usuario = htmlspecialchars(trim($_POST['nombre_usuario']));
        $mascota_id = intval($_POST['mascota_id']);
        $servicio_id = intval($_POST['servicio_id']);
        $fecha_reserva = htmlspecialchars(trim($_POST['fecha_reserva']));

        // Comprobar si hay conflicto de horario con otra reserva
        if (checkReservaConflict($id, $fecha_reserva, $servicio_id)) {
            echo "<script>
                alert('Error: Ya existe una reserva para este servicio en la fecha y hora seleccionadas.');
                window.location.href = 'editar_reserva.php?id=$id';
            </script>";
        } else {
            // Actualizar la reserva en la base de datos
            if (updateReserva($id, $nombre_usuario, $mascota_id, $servicio_id, $fecha_reserva)) {
                echo "<script>
                    alert('Reserva actualizada con éxito.');
                    window.location.href = 'ver_reservas.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error al actualizar la reserva.');
                    window.location.href = 'editar_reserva.php?id=$id';
                </script>";
            }
        }
    }
}
// Función para obtener todos los animales disponibles para adopción
function getAnimalesDisponibles() {
    global $conn;

    $query = "SELECT * FROM animales_disponibles";
    $result = $conn->query($query);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error al obtener los animales disponibles: " . $conn->error;
        return [];
    }
}
// Función para obtener todas las adopciones
function getAdopciones() {
    global $conn;

    $query = "SELECT * FROM adopciones";
    $result = $conn->query($query);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error al obtener las adopciones: " . $conn->error;
        return [];
    }
}


// Función para eliminar una adopción y restaurar el animal a la tabla 'animales_disponibles'
function eliminarAdopcionYRestaurarAnimal($id, $nombre_animal, $tipo_animal, $raza) {
    global $conn;

    // Iniciar una transacción
    $conn->begin_transaction();

    try {
        // Eliminar la adopción de la tabla 'adopciones'
        $stmt_delete = $conn->prepare("DELETE FROM adopciones WHERE id = ?");
        $stmt_delete->bind_param("i", $id);
        $stmt_delete->execute();

        // Restaurar el animal en la tabla 'animales_disponibles'
        $stmt_restore = $conn->prepare("INSERT INTO animales_disponibles (nombre, tipo_animal, raza, anos, descripcion) VALUES (?, ?, ?, 1, 'Disponible nuevamente para adopción')");
        $stmt_restore->bind_param("sss", $nombre_animal, $tipo_animal, $raza);
        $stmt_restore->execute();

        // Confirmar la transacción
        $conn->commit();
        $stmt_delete->close();
        $stmt_restore->close();
        return true;
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        echo "Error al eliminar la adopción y restaurar el animal: " . $e->getMessage();
        return false;
    }
}



// Función para obtener una adopción por su ID
function getAdopcionById($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM adopciones WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $adopcion = $result->fetch_assoc();
    $stmt->close();

    return $adopcion;
}
