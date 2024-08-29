<?php
// Verificar si el formulario fue enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validar que todos los campos están completos
    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        // Crear una cadena de texto para guardar en el archivo de texto
        $form_data = "Nombre: $nombre\nEmail: $correo\nMensaje: $mensaje\n\n";

        // Especificar el nombre del archivo donde se guardarán los datos
        $archivo = 'formularios.txt';

        // Guardar los datos en el archivo de texto
        file_put_contents($archivo, $form_data, FILE_APPEND);

        echo "<script>
            alert('Gracias por tu mensaje. Hemos recibido tu información.');
            window.location.href = 'contacto.php';
        </script>";
    } else {
        echo "<script>
            alert('Por favor, complete todos los campos del formulario.');
            window.location.href = 'contacto.php';
        </script>";
    }
} else {

    header("Location: contacto.php");
    exit;
}
?>
