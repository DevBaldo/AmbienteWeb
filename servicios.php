<?php
include("functions.php");
$menu = getMenu();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Servicios - Veterinaria San Mateo</title>
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
            <h2>Servicios</h2>
            <p>Le invitamos a iniciar sesión para acceder a nuestos servicios.</p>
            <p style="text-align: left;">Ofrecemos para su mascota:</p>
            <ul class="service-list">
             <li>Consultas generales y de especialidad</li>
             <li>Vacunación</li>
             <li>Desparasitación</li>
             <li>Cirugías</li>
             <li>Radiografías y ecografías</li>
             <li>Hospitalización</li>
             <li>Laboratorio clínico</li>
             <li>Grooming</li>
             <li>Venta de alimentos y accesorios</li>
            </ul>
            <div class="service-container">
                <div class="service-box">
                    <img src="./images/corte.jpg" alt="Servicio 1">
                    <h3>Corte de cabello</h3>
                    <a href="ingresar.php" class="button">Iniciar Sesión</a>
                </div>
                <div class="service-box">
                    <img width="215" height="90"src="./images/consejos.jpg" alt="Servicio 2">
                    <h3>Consejos y recomendaciones</h3>
                    <a href="ingresar.php" class="button">Iniciar Sesión</a>
                </div>
                <div class="service-box">
                    <img src="./images/medicamentos.jpg" alt="Servicio 3">
                    <h3>Medicamentos</h3>
                    <a href="ingresar.php" class="button">Iniciar Sesión</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>