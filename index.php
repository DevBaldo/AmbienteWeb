<?php
$title = "Inicio - Clínica Veterinaria";
include 'header.php';
include 'db.php'; // Conectar con la base de datos

// Consultar las mascotas disponibles para adopción
$mascotasQuery = "SELECT nombre, especie, raza, edad, sexo FROM Mascotas WHERE estado_adopcion = 'Disponible'";
$mascotasResult = $conn->query($mascotasQuery);

// Consultar los servicios ofrecidos
$serviciosQuery = "SELECT nombre_servicio, descripcion, precio FROM Servicios";
$serviciosResult = $conn->query($serviciosQuery);

// Consultar la información de contacto
$contactosQuery = "SELECT nombre, email, telefono FROM Contactos ORDER BY fecha_envio DESC LIMIT 1";
$contactosResult = $conn->query($contactosQuery);
$contacto = $contactosResult->fetch_assoc();
?>

<main class="container my-4">
    <h2>Bienvenidos a nuestra Clínica Veterinaria</h2>
    <p>En nuestra clínica ofrecemos servicios completos para el cuidado de tus mascotas. Desde consultas médicas hasta servicios de emergencia, estamos aquí para ayudarte.</p>

    <section>
        <h3>Mas mascotas disponibles para adopción</h3>
        <?php if ($mascotasResult->num_rows > 0): ?>
            <div class="row">
                <?php while ($mascota = $mascotasResult->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($mascota['nombre']); ?></h5>
                                <p class="card-text">
                                    Especie: <?php echo htmlspecialchars($mascota['especie']); ?><br>
                                    Raza: <?php echo htmlspecialchars($mascota['raza']); ?><br>
                                    Edad: <?php echo htmlspecialchars($mascota['edad']); ?> años<br>
                                    Sexo: <?php echo htmlspecialchars($mascota['sexo']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No tenemos mascotas disponibles para adopción en este momento.</p>
        <?php endif; ?>
    </section>

    <section>
        <h3>Servicios que ofrecemos</h3>
        <?php if ($serviciosResult->num_rows > 0): ?>
            <div class="list-group">
                <?php while ($servicio = $serviciosResult->fetch_assoc()): ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1"><?php echo htmlspecialchars($servicio['nombre_servicio']); ?></h5>
                        <p class="mb-1"><?php echo htmlspecialchars($servicio['descripcion']); ?></p>
                        <small>Precio: $<?php echo htmlspecialchars($servicio['precio']); ?></small>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No hay servicios disponibles en este momento.</p>
        <?php endif; ?>
    </section>

    <section>
        <h3>Últimos mensajes de contacto</h3>
        <?php if ($contacto): ?>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($contacto['nombre']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($contacto['email']); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($contacto['telefono']); ?></p>
        <?php else: ?>
            <p>No hay mensajes de contacto recientes.</p>
        <?php endif; ?>
    </section>
</main>

<?php include 'footer.php'; ?>
