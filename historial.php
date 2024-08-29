<?php
include 'functions.php';

$menu = getMenu();
$historialClinico = [];
$mascota = null;

if (isset($_GET['nombre_mascota'])) {
    $nombreMascota = $_GET['nombre_mascota'];
    $mascota = getMascotaByName($nombreMascota);
    
    if ($mascota) {
        $historialClinico = getHistorialClinicoByMascotaId($mascota['id']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Historial Clínico - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>
</head>

<body>
    <header>
        <h1>Historial Clínico</h1>
        <nav>
            <ul>
                <?php foreach ($menu as $item) { ?>
                    <li><a href="<?php echo $item["url"]; ?>"><?php echo $item["name"]; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Buscar Historial Clínico</h2>
            <form method="get" action="historial.php">
                <input type="text" name="nombre_mascota" placeholder="Nombre de la mascota" required>
                <button type="submit">Buscar</button>
            </form>

            <?php if ($mascota): ?>
                <h3>Datos de la Mascota</h3>
                <p><strong>Nombre:</strong> <?php echo $mascota['nombre']; ?></p>
                <p><strong>Tipo:</strong> <?php echo $mascota['tipo']; ?></p>
                <p><strong>Edad:</strong> <?php echo $mascota['edad']; ?> años</p>

                <h3>Historial Clínico</h3>
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de Reserva</th>
                            <th>Servicio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($historialClinico) > 0): ?>
                            <?php foreach ($historialClinico as $historial): ?>
                                <tr>
                                    <td><?php echo $historial['id']; ?></td>
                                    <td><?php echo $historial['fecha_reserva']; ?></td>
                                    <td><?php echo $historial['nombre_servicio']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No hay historial clínico para esta mascota.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif (isset($_GET['nombre_mascota'])): ?>
                <p>No se encontró ninguna mascota con ese nombre.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>