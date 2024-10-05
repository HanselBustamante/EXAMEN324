<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud - HAM-LP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclusión del header -->
<?php include('header.php'); ?>

<!-- Cuerpo de la página -->
<div class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="mt-4">
            <h1 class="text-center">Salud</h1>
            <p class="text-center">Información sobre los servicios de salud disponibles y programas de atención a la comunidad.</p>
 

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://lapaz.bo/wp-content/uploads/2024/03/5216000-1.png" class="card-img-top img-fluid" alt="Hospitales">
                        <div class="card-body">
                            <h5 class="card-title">Hospitales</h5>
                            <p class="card-text">Información sobre los hospitales disponibles en la alcaldía.</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://lapaz.bo/wp-content/uploads/2024/06/46.webp" class="card-img-top img-fluid" alt="Deportes">
                        <div class="card-body">
                            <h5 class="card-title">Deportes</h5>
                            <p class="card-text">Programas deportivos para la salud y bienestar de la comunidad.</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://lapaz.bo/wp-content/uploads/2024/06/can2-1152x1536.jpg" class="card-img-top img-fluid" alt="Casa de la Mascota">
                        <div class="card-body">
                            <h5 class="card-title">Casa de la Mascota</h5>
                            <p class="card-text">Servicios y atención para las mascotas de la comunidad.</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
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
