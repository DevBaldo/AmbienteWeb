<?php
include("functions.php"); 
$menu = getMenu(); 


$servicios = getServicios();
$mascotas = getMascotas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reservar - Veterinaria San Mateo</title>
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
            <h2>Realizar una Reserva</h2>
            <form method="post" action="procesar_reserva.php">
                <label for="nombre">Nombre del Usuario:</label>
                <input type="text" name="nombre" id="nombre" required>
                <br>
            
                <label for="mascota">Nombre de la Mascota:</label>
                <select name="mascota" id="mascota" required>
                    <?php foreach ($mascotas as $mascota) { ?>
                        <option value="<?php echo $mascota['id']; ?>"><?php echo $mascota['nombre']; ?></option>
                    <?php } ?>
                </select>
                <br>


                <label for="fecha">Fecha y Hora de Reserva:</label>
                <input type="datetime-local" name="fecha" id="fecha" required>
                <br>


                <label for="servicio">Seleccione un Servicio:</label>
                <select name="servicio" id="servicio" required>
                    <?php foreach ($servicios as $servicio) { ?>
                        <option value="<?php echo $servicio['id']; ?>"><?php echo $servicio['nombre'] . " - $" . number_format($servicio['precio'], 2); ?></option>
                    <?php } ?>
                </select>
                <br>

                <button type="submit">Reservar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
