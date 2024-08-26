<?php
$title = "Iniciar Sesión - Clínica Veterinaria";
include 'header.php';
?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Iniciar Sesión</h2>
            <form method="post" action="procesar_ingresar.php">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="clave">Clave:</label>
                    <input type="password" class="form-control" id="clave" name="clave" required>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
