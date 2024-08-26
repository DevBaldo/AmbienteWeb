<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $admin = $stmt->fetch();

    if ($admin && hash('sha256', $clave) === $admin['clave']) {
        $_SESSION['admin'] = $admin['usuario'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o clave incorrecta";
    }
}
?>