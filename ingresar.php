<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/scriptvjquery.js"></script>
</head>

<body>
    <header>
        <h1>Veterinaria San Mateo</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="reservas.php">Reservas</a></li>
                <li><a href="adopciones.php">Adopciones</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="ingresar.php">Inicio de Sesion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Iniciar sesion</h2>
             <form method="POST" action="procesar_ingresar.php">
                <label>Usuario</label>
                <input type="text" name="usuario">
                <br>
                <label>Clave</label>
                <input type="password" name="clave">
                <br>
                <button type="submit" id="boton_envio">Ingresar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Veterinaria San Mateo. Todos los derechos reservados.</p>
    </footer>
</body>

</html>