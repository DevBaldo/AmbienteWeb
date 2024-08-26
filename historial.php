<?php
$title = "Adopciones - Clínica Veterinaria";
include 'header.php';
?>

        <section class="historial">
            <h2>Buscar Historial Clínico por ID</h2>
            <form id="historialForm" action="buscar_historial.php" method="GET">
                <label for="id">ID del Paciente:</label>
                <input type="text" id="id" name="id" required><br><br>
                
                <button type="submit">Buscar Historial</button>
            </form>
            <div id="resultado"></div>
        </section>

<?php include 'footer.php'; ?>