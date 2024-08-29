<?php
include 'functions.php'; // Incluye las funciones necesarias y la conexión a la base de datos
$menu = getMenu(); // Obtener el menú de navegación

// Obtener la lista de adopciones
$adopciones = getAdopciones(); // Función que obtiene todas las adopciones

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Adopciones - Veterinaria San Mateo</title>
    <link rel="stylesheet" href="./css/style.css">
   </head>

<body>
    <header>
        <h1>Veterinaria San Mateo</h1>
        <nav>
            <ul>
                <?php foreach ($menu as $item) { ?>
                    <li><a href="<?php echo $item["url"]; ?>"><?php echo $item["name"]; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="adopciones-container">
            <h2>Lista de Adopciones Realizadas</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID de Adopción</th>
                        <th>Nombre del Animal</th>
                        <th>Tipo de Animal</th>
                        <th>Raza</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($adopciones)): ?>
                        <?php foreach ($adopciones as $adopcion): ?>
                            <tr>
                                <td><?php echo $adopcion['id']; ?></td>
                                <td><?php echo $adopcion['nombre_animal']; ?></td>
                                <td><?php echo $adopcion['tipo_animal']; ?></td>
                                <td><?php echo $adopcion['raza']; ?></td>
                                <td><?php echo $adopcion['estado']; ?></td>
                                <td class="action-buttons">
                                <form method="post" action="eliminar_adopcion.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $adopcion['id']; ?>">
                                <input type="hidden" name="nombre_animal" value="<?php echo $adopcion['nombre_animal']; ?>">
                                <input type="hidden" name="tipo_animal" value="<?php echo $adopcion['tipo_animal']; ?>">
                                <input type="hidden" name="raza" value="<?php echo $adopcion['raza']; ?>">
                                <button type="submit">Eliminar</button>
                                </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No hay adopciones registradas.</td>
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
