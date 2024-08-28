<?php
include("functions.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contacto - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>
</head>

<body>
    <header>
        <h1>Veterinaria San Mateo</h1>
        <nav>
            <ul>
                <?php foreach ($menu as $item) { ?>
                    <li><a href="<?php echo $item["url"] ?>"><?php echo $item["name"] ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Contacto</h2>
            <div class="informacion-contacto">
                <p><strong>Teléfono:</strong> 2222-9876</p>
                <p><strong>Email:</strong> <a href="mailto:contacto@veterinariasanmateo.com">contacto@veterinariasanmateo.com</a></p>
                <p><strong>Dirección:</strong> Calle 123, Heredia, Costa Rica</p>
            </div>

            <h2 class="contact">Para más información, puedes contactarnos a través de nuestro formulario en línea</h2>
            <form method="post" action="procesar_contacto.php">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <br>
                <label>Email</label>
                <input type="email" name="correo" id="correo">
                <br>
                <label>Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
                <br>
                <button type="submit" id="boton_envio">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>