<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos - HAM-LP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclusión del header -->
<?php include('header.php'); ?>

<!-- Cuerpo de la página -->
<div class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="mt-4">
            <h1 class="text-center">Contactos</h1>
            <p class="text-center">Encuentra aquí los datos de contacto de las diferentes oficinas de la alcaldía.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Oficina de Atención al Ciudadano</h5>
                            <p class="card-text">Teléfono: 77217411</p>
                            <p class="card-text">Correo: contacto@ham-lp.com</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Departamento de Salud</h5>
                            <p class="card-text">Teléfono: 77217411</p>
                            <p class="card-text">Correo: salud@ham-lp.com</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Secretaría de Gobierno</h5>
                            <p class="card-text">Teléfono: 77217411</p>
                            <p class="card-text">Correo: gobierno@ham-lp.com</p>
                            <a href="#" class="btn btn-primary">Más información</a>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="mt-5">Direcciones y Números Telefónicos</h2>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Instancia</th>
                        <th>Autoridades</th>
                        <th>Dirección</th>
                        <th>Teléfonos</th>
                        <th>Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Despacho Alcalde Municipal</td>
                        <td>Lic. Hernán Iván Arias Duran</td>
                        <td>Edificio 10 (Edif. Ex Soboce) Piso 10, Calle Socabaya esq. Mercado</td>
                        <td>2650002</td>
                        <td>ivan.arias@lapaz.bo</td>
                    </tr>
                    <tr>
                        <td>Oficial Asesor</td>
                        <td>Lic. Oscar Gustavo Navarro Apaza</td>
                        <td>Edificio 10 (Edif. Ex Soboce) Piso 8, Calle Socabaya esq. Mercado</td>
                        <td>265 0201</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sección Administrativa Financiera DAM</td>
                        <td>Lic. Marcela Parra Huanca</td>
                        <td>Edificio 10 (Edif. Ex Soboce) Piso 4, Calle Socabaya esq. Mercado</td>
                        <td>2651106</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Unidad de Gabinete</td>
                        <td>Lic. Marlene Liliana Lanza Antezana</td>
                        <td>Edificio 10 (Edif. Ex Soboce) Piso 10, Calle Socabaya esq. Mercado</td>
                        <td>2650002</td>
                        <td>marlene.lanza@lapaz.bo</td>
                    </tr>
                    <tr>
                        <td>Seguimiento y Archivo General</td>
                        <td>Lic. Ninoska Kirla Endara</td>
                        <td>Edificio 10 (Edif. Ex Soboce) Piso 4, Calle Socabaya esq. Mercado</td>
                        <td>265 0303</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Inclusión del footer -->
    <?php include('footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
