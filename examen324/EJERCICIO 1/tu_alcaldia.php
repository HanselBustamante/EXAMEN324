<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Alcaldía - HAM-LP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclusión del header -->
<?php include('header.php'); ?>

<!-- Cuerpo de la página -->
<div class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="mt-4">
            <h1 class="text-center">Tu Alcaldía</h1>
            <p class="text-center">Aquí puedes encontrar información sobre los servicios que ofrece tu alcaldía, incluyendo programas sociales, eventos y más.</p>
            
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2 class="text-center">Misión Institucional</h2>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-justify">Somos una institución pública municipal renovada, dinámica, transparente e incluyente, que brinda servicios públicos modernos, eficientes, ágiles y planificados, con concertación y participación ciudadana, impulsando una convivencia pacífica en búsqueda de una mejor calidad de vida de la población paceña por el Bien Común.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <h2 class="text-center">Visión Institucional</h2>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-justify">Ser una institución pública modelo de gestión municipal democrática, participativa, transparente, eficiente, innovadora y tecnológica, que dinamiza la economía, el desarrollo social y territorial; consolidando una La Paz saludable, productiva, competitiva, biodiversa y resiliente, cultural, ordenada e interconectada, con diálogo y reconciliación por el Bien Común.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h2 class="text-center">¿Quiénes Somos?</h2>
                    <div class="text-center">
                        <img src="https://lapaz.bo/wp-content/uploads/2022/07/ivan_arias_duran_alcalde-768x514.png" class="img-fluid mb-3" alt="Alcalde Ivan Arias Duran" style="max-width: 300px;">
                        <p>Conoce a nuestro alcalde Ivan Arias Duran, quien lidera la renovación y transparencia en la gestión municipal.</p>
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
