<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Personas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Buscar Persona</h2>
        <form action="listar_personas.php" method="get" class="text-center mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control form-control-lg" placeholder="Ingrese CI o Nombre" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
            <a href="listar_personas.php" class="btn btn-secondary btn-lg ml-2">Limpiar</a>
            <a href="form_persona.php" class="btn btn-success btn-lg ml-2">Agregar Persona</a>
        </form>

        <h3>Resultados</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Trámite</th> <!-- Agregar columna para Trámite -->
                    <th>Zona</th>
                    <th>X Inicial</th>
                    <th>Y Inicial</th>
                    <th>X Final</th>
                    <th>Y Final</th>
                    <th>Superficie</th>
                    <th>Distrito</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexion.php';

                $search = isset($_GET['search']) ? $_GET['search'] : null;

                // Consulta para mostrar todas las personas junto con su información de catastro y trámite
                if ($search) {
                    $query = "SELECT p.ci, p.nombre, p.paterno, c.zona, c.x_ini, c.y_ini, c.x_fin, c.y_fin, c.superficie, c.distrito, t.tipo_tramite 
                              FROM Persona p 
                              INNER JOIN Catastro c ON p.ci = c.ci_persona
                              LEFT JOIN Tramites t ON c.id_tramite = t.id 
                              WHERE p.ci LIKE ? OR p.nombre LIKE ?";

                    $stmt = $pdo->prepare($query);
                    $likeSearch = "%$search%";
                    $stmt->execute([$likeSearch, $likeSearch]);
                } else {
                    // Si no hay búsqueda, muestra todas las personas
                    $query = "SELECT p.ci, p.nombre, p.paterno, c.zona, c.x_ini, c.y_ini, c.x_fin, c.y_fin, c.superficie, c.distrito, t.tipo_tramite 
                              FROM Persona p 
                              INNER JOIN Catastro c ON p.ci = c.ci_persona
                              LEFT JOIN Tramites t ON c.id_tramite = t.id";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                }

                $personas = $stmt->fetchAll();

                if ($personas) {
                    foreach ($personas as $persona) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($persona['ci']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['paterno']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['tipo_tramite']) . "</td>"; // Mostrar trámite
                        echo "<td>" . htmlspecialchars($persona['zona']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['x_ini']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['y_ini']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['x_fin']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['y_fin']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['superficie']) . "</td>";
                        echo "<td>" . htmlspecialchars($persona['distrito']) . "</td>";
                        echo "<td>
                                <a href='editar_persona.php?ci=" . htmlspecialchars($persona['ci']) . "' class='btn btn-warning'>Editar</a>
                                <a href='baja_persona.php?ci=" . htmlspecialchars($persona['ci']) . "' class='btn btn-danger'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No se encontraron resultados.</td></tr>"; // Cambiar a 12 columnas
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
