<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - HAM-LP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclusión del header -->
<?php include('header.php'); ?>

<!-- Cuerpo de la página -->
<div class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="text-center mt-5">
            <h1>Bienvenido a la HAM-LP</h1>
            <p class="lead">Aquí puedes encontrar información sobre tu alcaldía y los servicios que ofrecemos.</p>
            <a href="tu_alcaldia.php" class="btn btn-primary btn-lg">Descubre tu Alcaldía</a>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwYuLlHoO0k5iiHhmbt6jIdbUq0ETZ1gYUEw&s" class="card-img-top" alt="Servicio 1">
                    <div class="card-body">
                        <h5 class="card-title">Trámites y Servicios</h5>
                        <p class="card-text">Accede a todos los trámites y servicios que la alcaldía ofrece.</p>
                        <a href="tramites_servicios.php" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwYuLlHoO0k5iiHhmbt6jIdbUq0ETZ1gYUEw&s" class="card-img-top" alt="Gobierno Abierto">
                    <div class="card-body">
                        <h5 class="card-title">Gobierno Abierto</h5>
                        <p class="card-text">Conoce más sobre la transparencia y participación ciudadana.</p>
                        <a href="gobierno_abierto.php" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwYuLlHoO0k5iiHhmbt6jIdbUq0ETZ1gYUEw&s" class="card-img-top" alt="Salud">
                    <div class="card-body">
                        <h5 class="card-title">Servicios de Salud</h5>
                        <p class="card-text">Infórmate sobre los servicios de salud disponibles.</p>
                        <a href="salud.php" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Inclusión del footer -->
    <?php include('footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
