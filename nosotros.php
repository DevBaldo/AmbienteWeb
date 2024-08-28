<?php
include("functions.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nosotros - Veterinaria San Mateo</title>
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
        <section class="about">
            <h2>Sobre Nosotros</h2>
            <p>En nuestra veterinaria, estamos dedicados a proporcionar el mejor cuidado posible para su mascota. Con años de experiencia en el campo, nuestro equipo de profesionales se compromete a mantener la salud y el bienestar de su mascota.</p>
        </section>
        <section class="vision">
            <h2>Visión</h2>
            <p>Ser la clínica veterinaria líder en atención y servicio al cliente, conocida por nuestro compromiso con la salud animal y el bienestar de las mascotas en nuestra comunidad.</p>
        </section>
        <section class="mission">
            <h2>Misión</h2>
            <p>Ofrecer servicios veterinarios de alta calidad, promoviendo el bienestar animal a través de la educación, prevención, y tratamientos innovadores, mientras brindamos un ambiente acogedor y profesional tanto para las mascotas como para sus dueños.</p>
        </section>
        <section class="objectives">
            <h2>Objetivos</h2>
            <ul>
                <li>Proveer cuidados médicos preventivos y tratamientos avanzados para mascotas.</li>
                <li>Fomentar la educación y concienciación sobre la salud animal entre los dueños de mascotas.</li>
                <li>Crear un entorno seguro y cómodo para los animales durante su visita a nuestra clínica.</li>
                <li>Innovar continuamente en nuestros servicios y técnicas para mejorar la calidad de vida de las mascotas.</li>
            </ul>
        </section>
        <section class="team">
            <h2>Nuestro Equipo</h2>
            <p>Contamos con un equipo de veterinarios altamente calificados y personal de apoyo que están apasionados por el cuidado de los animales. Desde nuestros veterinarios experimentados hasta nuestro amable equipo de recepción, todos están aquí para garantizar que usted y su mascota tengan una experiencia positiva en nuestra clínica.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>