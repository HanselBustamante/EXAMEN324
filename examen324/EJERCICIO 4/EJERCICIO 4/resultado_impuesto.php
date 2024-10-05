<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Impuesto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Resultado del Impuesto de la Propiedad</h2>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['impuesto'])) {
                    $impuesto = $_GET['impuesto'];
                    echo "<h3 class='text-center'>El tipo de impuesto es: <span class='text-success'>" . htmlspecialchars($impuesto) . "</span></h3>";
                } else {
                    echo "<h3 class='text-center text-danger'>No se pudo obtener el tipo de impuesto.</h3>";
                }
                ?>
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
