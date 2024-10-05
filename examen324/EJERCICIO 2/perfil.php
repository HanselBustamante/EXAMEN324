<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: login.php"); // Redirigir a login si no es usuario
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, Usuario!</h2>
        <p><a href="logout.php" class="btn btn-danger">Cerrar Sesión</a></p>
        <!-- Aquí puedes incluir la funcionalidad del usuario normal -->
    </div>
</body>
</html>
