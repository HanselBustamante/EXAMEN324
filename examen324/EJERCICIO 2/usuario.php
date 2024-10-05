<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
    exit;
}

// Asegúrate de incluir la conexión a la base de datos aquí
include 'conexion.php'; // Asegúrate de que esta línea esté apuntando al archivo correcto de conexión.

$ci_usuario = $_SESSION['ci']; // Suponiendo que almacenas el CI del usuario en la sesión.

try {
    // Obtener los datos del usuario logueado junto con el tipo de trámite
    $stmt = $pdo->prepare("
        SELECT p.ci, p.nombre, p.paterno, c.zona, c.x_ini, c.y_ini, c.x_fin, c.y_fin, c.superficie, c.distrito, t.tipo_tramite
        FROM persona p
        LEFT JOIN catastro c ON p.ci = c.ci_persona
        LEFT JOIN tramites t ON c.id_tramite = t.id
        WHERE p.ci = :ci
    ");
    $stmt->bindParam(':ci', $ci_usuario);
    $stmt->execute();
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($persona) {
        // Mostrar los datos del usuario
        $nombreCompleto = htmlspecialchars($persona['nombre']) . " " . htmlspecialchars($persona['paterno']);
    } else {
        $nombreCompleto = "Usuario no encontrado.";
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario Normal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenido, <?php echo $nombreCompleto; ?></h1>
            <p class="lead">Aquí están tus datos registrados en el sistema:</p>
        </div>

        <?php if ($persona): ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>Zona</th>
                        <th>X Inicio</th>
                        <th>Y Inicio</th>
                        <th>X Fin</th>
                        <th>Y Fin</th>
                        <th>Superficie</th>
                        <th>Distrito</th>
                        <th>Tipo de Trámite</th> <!-- Nueva columna -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($persona['ci']); ?></td>
                        <td><?php echo htmlspecialchars($persona['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($persona['paterno']); ?></td>
                        <td><?php echo htmlspecialchars($persona['zona']); ?></td>
                        <td><?php echo htmlspecialchars($persona['x_ini']); ?></td>
                        <td><?php echo htmlspecialchars($persona['y_ini']); ?></td>
                        <td><?php echo htmlspecialchars($persona['x_fin']); ?></td>
                        <td><?php echo htmlspecialchars($persona['y_fin']); ?></td>
                        <td><?php echo htmlspecialchars($persona['superficie']); ?></td>
                        <td><?php echo htmlspecialchars($persona['distrito']); ?></td>
                        <td><?php echo htmlspecialchars($persona['tipo_tramite']); ?></td> <!-- Mostrar trámite -->
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <h2 class="text-danger"><?php echo $nombreCompleto; ?></h2>
        <?php endif; ?>

        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
