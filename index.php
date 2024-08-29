<?php 
include("functions.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/scriptvjquery.js"></script>
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
            <img width="500" height="300" src="./images/vete.jpg" id="imagenPrincipal">
        </section>
        <section>
            <h2>Bienvenidos a la Veterinaria San Mateo</h2>
            <p>Descubra los diferentes productos y servicios que tenemos para su mascota</p>
        </section>
        <section>
            <h2>Servicios</h2>
            <div class="service-container">
                <div class="service-box">
                    <img src="./images/corte.jpg" alt="Servicio 1">
                    <h3>Corte de cabello</h3>
                    <p>Contamos con los mejores profesionales para el estilo de su mascota.</p>
                </div>
                <div class="service-box">
                    <img src="./images/servicio2.jpg" alt="Servicio 2">
                    <h3>Recursos Digitales</h3>
                    <p>Utilice nuestros recursos digitales para agendar sus citas.</p>
                </div>
                <div class="service-box">
                    <img src="./images/adopcion.jpg" alt="Servicio 3">
                    <h3>Adopciones</h3>
                    <p>Participe en el proceso para adoptar una nueva mascota.</p>
                </div>
            </div>
        </section>
        <section>
            <h2>Contacto</h2>
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