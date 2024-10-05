<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normativa - HAM-LP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclusión del header -->
<?php include('header.php'); ?>

<!-- Cuerpo de la página -->
<div class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="mt-4">
            <h1 class="text-center">Normativa</h1>
            <p class="text-center">Aquí encontrarás la normativa vigente y regulaciones que rigen en nuestra alcaldía.</p>
            
            <div class="mt-4">
                <h2>Buscar Normativa</h2>
                <form class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Código Documento">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option selected>Área temática</option>
                            <option value="1">Salud</option>
                            <option value="2">Seguridad</option>
                            <option value="3">Urbanismo</option>
                            <option value="4">Transporte</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="mt-5">
                <h2>Los Más Buscados</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5>OM 00076/04</h5>
                        <p>Reglamento de Procedimiento Técnico Administrativo en sus 8 Títulos, 59 ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00233/17</h5>
                        <p>Se regula la fiscalización territorial respecto al cumplimiento de la normativa ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00007/11</h5>
                        <p>Se aprueba la Ley Municipal cuyo objeto es crear, organizar y estructurar el orden ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>OM 00193/10</h5>
                        <p>Se instruye al Ejecutivo Municipal en todas las solicitudes de Registro y Certificación ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>OM 00622/11</h5>
                        <p>Se aprueba un proceso voluntario, transitorio y excepcional de Regulación ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00012/11</h5>
                        <p>Se crea los impuestos de dominio público municipal a la Propiedad de Bienes ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>OM 00634/11</h5>
                        <p>Se modifica el reglamento para establecimiento de expendios de alimentos y bebidas ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00015/12</h5>
                        <p>Norma que regula y controla el transporte y tránsito urbano ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00217/16</h5>
                        <p>Se integra, modifica y actualiza las Patentes de dominio municipal ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                    <li class="list-group-item">
                        <h5>LM 00263/17</h5>
                        <p>Se aprueba la Ley Municipal Autonómica de Control al expendio y consumo ...</p>
                        <a href="#" class="btn btn-secondary">Ver más</a>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <!-- Inclusión del footer -->
    <?php include('footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
