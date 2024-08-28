<?php
include 'functions.php'; 
$menu = getMenu(); 

$animales = getAnimalesDisponibles(); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Adopciones - Veterinaria San Mateo</title>
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
        <section>
            <h2>Animales Disponibles para Adopción</h2>
            <div class="animales-container">
                <?php if (!empty($animales)): ?>
                    <?php foreach ($animales as $animal): ?>
                        <div class="animal-card">
                            <?php 
                            $image_file = '';
                            if (stripos($animal['raza'], 'Labrador') !== false) {
                                $image_file = 'Labrador.jpg';
                            } elseif (stripos($animal['tipo_animal'], 'Gato') !== false) {
                                $image_file = 'gato.jpg';
                            } elseif (stripos($animal['raza'], 'Bulldog') !== false) {
                                $image_file = 'bulldog.jpg';
                            }
                            ?>
                            <img src="./images/<?php echo $image_file; ?>" alt="<?php echo $animal['nombre']; ?>" class="animal-img">
                            <h3><?php echo $animal['nombre']; ?> - <?php echo $animal['tipo_animal']; ?></h3>
                            <p><strong>Raza:</strong> <?php echo $animal['raza']; ?></p>
                            <p><strong>Edad:</strong> <?php echo $animal['anos']; ?> años</p>
                            <p><?php echo $animal['descripcion']; ?></p>
                            <form method="post" action="procesar_adopcion.php">
                                <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>">
                                <button type="submit">Adoptar</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay animales disponibles para adopción en este momento.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
