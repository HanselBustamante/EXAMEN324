<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE ci_persona = :ci");
    $stmt->bindParam(':ci', $ci);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Comprobar la contraseña
        if ($usuario['contrasena'] === $contrasena) {
            $_SESSION['ci'] = $ci;
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir a la página correspondiente según el rol
            if ($usuario['rol'] === 'admin') {
                header("Location: abc.php"); // Página del ABC para administrador
            } else {
                header("Location: usuario.php"); // Página para usuario normal
            }
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
