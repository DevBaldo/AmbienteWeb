<?php
include("functions.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Recomendaciones - Veterinaria San Mateo</title>
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
        <section>
            <h2 style="text-align: left">Cuidados Generales</h2>
            <p style="text-align: left">Es importante proporcionar un ambiente seguro y saludable para tus mascotas. Aquí tienes algunos consejos para el cuidado general:</p>
            <ul class="service-list">
                <li>Asegúrate de que tu mascota tenga agua fresca y limpia en todo momento.</li>
                <li>Proporciona una dieta equilibrada y adecuada para su especie y tamaño.</li>
                <li>Proporciona una cama cómoda y un lugar seguro para descansar.</li>
                <li>Realiza visitas regulares al veterinario para chequeos y vacunaciones.</li>
            </ul>
        </section>
        <section>
            <h2 style="text-align: left">Higiene</h2>
            <p style="text-align: left">Mantener a nuestras mascotas limpias no solo las ayuda a lucir y sentirse bien, sino que también previene enfermedades y parásitos. Aquí hay algunos tips:</p>
            <ul class="service-list">
                <li>Cepilla a tu mascota regularmente para evitar enredos y eliminar el pelo suelto.</li>
                <li>Baños regulares según las necesidades específicas de tu mascota.</li>
                <li>Mantén las uñas recortadas y los oídos limpios.</li>
            </ul>
        </section>
        <section>
            <h2 style="text-align: left">Ejercicio</h2>
            <p style="text-align: left">El ejercicio es fundamental para mantener a nuestras mascotas sanas y felices. 
                Al igual que los humanos, los animales necesitan actividad física regular para mantenerse en forma y prevenir problemas de salud. Aquí hay algunos tips:</p>
          <ul class="service-list">
                <li>Dedica tiempo diariamente para jugar y ejercitar a tu mascota.</li>
                <li>Paseos diarios para perros y juguetes interactivos para gatos.</li>
                <li>Proporciona oportunidades para que tu mascota explore y se mantenga activa.</li>
            </ul>
          </main>

    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>