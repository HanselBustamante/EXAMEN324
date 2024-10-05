<?php
include 'conexion.php';

// Verifica si se recibió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci']; // Obtener CI de la persona
    $nombre = $_POST['nombre']; // Obtener nombre
    $paterno = $_POST['paterno']; // Obtener apellido paterno
    $x_ini = $_POST['x_ini']; // Obtener coordenada X inicial
    $y_ini = $_POST['y_ini']; // Obtener coordenada Y inicial
    $x_fin = $_POST['x_fin']; // Obtener coordenada X final
    $y_fin = $_POST['y_fin']; // Obtener coordenada Y final
    $superficie = $_POST['superficie']; // Obtener superficie

    try {
        // Registrar a la persona
        $stmtPersona = $pdo->prepare("INSERT INTO persona (ci, nombre, paterno) VALUES (:ci, :nombre, :paterno)");
        $stmtPersona->bindParam(':ci', $ci);
        $stmtPersona->bindParam(':nombre', $nombre);
        $stmtPersona->bindParam(':paterno', $paterno);
        $stmtPersona->execute();

        // Registrar al usuario normal en la tabla usuarios
        $stmtUsuario = $pdo->prepare("INSERT INTO usuarios (ci_persona, contrasena, rol) VALUES (:ci_persona, :contrasena, :rol)");
        $contrasena = $ci; // Usamos el CI como contraseña (no encriptada)
        $rol = 'normal'; // Rol del usuario normal
        $stmtUsuario->bindParam(':ci_persona', $ci);
        $stmtUsuario->bindParam(':contrasena', $contrasena);
        $stmtUsuario->bindParam(':rol', $rol);
        $stmtUsuario->execute();

        // Registrar la propiedad en la tabla catastro
        $stmtCatastro = $pdo->prepare("INSERT INTO catastro (ci_persona, x_ini, y_ini, x_fin, y_fin, superficie) VALUES (:ci_persona, :x_ini, :y_ini, :x_fin, :y_fin, :superficie)");
        $stmtCatastro->bindParam(':ci_persona', $ci);
        $stmtCatastro->bindParam(':x_ini', $x_ini);
        $stmtCatastro->bindParam(':y_ini', $y_ini);
        $stmtCatastro->bindParam(':x_fin', $x_fin);
        $stmtCatastro->bindParam(':y_fin', $y_fin);
        $stmtCatastro->bindParam(':superficie', $superficie);
        $stmtCatastro->execute();

        // Redirigir a listar_personas.php después de guardar
        header("Location: listar_personas.php");
        exit;
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al registrar: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Persona</h2>
        <form action="" method="post"> <!-- Se modifica para enviar al mismo archivo -->
            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" name="ci" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" name="paterno" class="form-control" required>
            </div>
            <?php include 'form_persona_common.php'; ?> <!-- Incluir el formulario común -->
            <div class="form-group">
                <label for="x_ini">Coordenada X Inicial:</label>
                <input type="text" name="x_ini" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="y_ini">Coordenada Y Inicial:</label>
                <input type="text" name="y_ini" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="x_fin">Coordenada X Final:</label>
                <input type="text" name="x_fin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="y_fin">Coordenada Y Final:</label>
                <input type="text" name="y_fin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="text" name="superficie" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
