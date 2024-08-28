<?php
include 'functions.php'; 
$menu = getMenu();
$reservas = getReservas(); 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Reservas - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>
</head>

<body>
    <header>
        <h1>Reservas Realizadas</h1>
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
            <h2>Lista de Reservas</h2>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Usuario</th>
                        <th>Nombre de la Mascota</th>
                        <th>Servicio</th>
                        <th>Fecha de Reserva</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($reservas) > 0): ?>
                        <?php foreach ($reservas as $reserva): ?>
                            <tr>
                                <td><?php echo $reserva['id']; ?></td>
                                <td><?php echo $reserva['nombre_usuario']; ?></td>
                                <td><?php echo $reserva['nombre_mascota']; ?></td>
                                <td><?php echo $reserva['nombre_servicio']; ?></td>
                                <td><?php echo $reserva['fecha_reserva']; ?></td>
                                <td>
                                    <a href="editar_reserva.php?id=<?php echo $reserva['id']; ?>">Editar</a> | 
                                    <a href="eliminar_reserva.php?id=<?php echo $reserva['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No hay reservas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>