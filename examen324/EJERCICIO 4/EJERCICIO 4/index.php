<?php
session_start();
include 'conexion.php'; // Archivo con la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ci = $_POST['ci'];

    // Consulta para obtener el ID del catastro
    $stmt = $pdo->prepare("SELECT c.id FROM Catastro c INNER JOIN Persona p ON p.ci = c.ci_persona WHERE p.ci = ?");
    $stmt->execute([$ci]);
    $catastro = $stmt->fetch();

    if ($catastro) {
        // Guardar el ID del catastro en una variable de sesión
        $_SESSION['catastro_id'] = $catastro['id'];
        
        // Redirigir al servlet con el ID del catastro
        header("Location: enviar_datos_servlet.php");
        exit();
    } else {
        $error = "CI no encontrado en la base de datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Iniciar Sesión</h2>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="ci">CI:</label>
                        <input type="text" name="ci" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Ingresar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
