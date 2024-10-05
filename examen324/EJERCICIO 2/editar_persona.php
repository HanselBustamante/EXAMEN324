<?php 
include 'conexion.php';
include 'tramites.php'; // Incluir la lógica de trámites

if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];

    // Obtener la persona actual
    $stmt = $pdo->prepare("SELECT * FROM Persona p INNER JOIN Catastro c ON p.ci = c.ci_persona WHERE p.ci = ?");
    $stmt->execute([$ci]);
    $persona = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Persona</h2>
        <form action="actualizar_persona.php" method="post">
            <input type="hidden" name="ci" value="<?= $persona['ci'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?= $persona['nombre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" name="paterno" class="form-control" value="<?= $persona['paterno'] ?>" required>
            </div>

            <?php include 'form_persona_common.php'; ?> <!-- Incluir el formulario común -->

            <div class="form-group">
                <label for="x_ini">Coordenada X Inicial:</label>
                <input type="text" name="x_ini" class="form-control" value="<?= $persona['x_ini'] ?>" required>
            </div>
            <div class="form-group">
                <label for="y_ini">Coordenada Y Inicial:</label>
                <input type="text" name="y_ini" class="form-control" value="<?= $persona['y_ini'] ?>" required>
            </div>
            <div class="form-group">
                <label for="x_fin">Coordenada X Final:</label>
                <input type="text" name="x_fin" class="form-control" value="<?= $persona['x_fin'] ?>" required>
            </div>
            <div class="form-group">
                <label for="y_fin">Coordenada Y Final:</label>
                <input type="text" name="y_fin" class="form-control" value="<?= $persona['y_fin'] ?>" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="text" name="superficie" class="form-control" value="<?= $persona['superficie'] ?>" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
