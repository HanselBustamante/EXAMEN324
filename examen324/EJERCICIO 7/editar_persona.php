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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Persona</h2>
        <form action="actualizar_persona.php" method="post">
            <input type="hidden" name="ci" value="<?= htmlspecialchars($persona['ci']) ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($persona['nombre']) ?>" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" name="paterno" class="form-control" value="<?= htmlspecialchars($persona['paterno']) ?>" required>
            </div>

            <!-- Combo de Distrito -->
            <div class="form-group">
                <label for="distrito">Distrito:</label>
                <select name="distrito" id="distrito" class="form-control" required>
                    <option value="">Seleccione un distrito</option>
                    <?php
                    // Consulta para obtener los distritos
                    $stmt = $pdo->query("SELECT * FROM distritos");
                    while ($distrito = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($distrito['id'] == $persona['distrito']) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($distrito['id']) . "' $selected>" . htmlspecialchars($distrito['nombre']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Combo de Zona -->
            <div class="form-group">
                <label for="zona">Zona:</label>
                <select name="zona" id="zona" class="form-control" required>
                    <option value="">Seleccione una zona</option>
                    <?php
                    // Consulta para obtener las zonas según el distrito
                    $stmt = $pdo->prepare("SELECT * FROM zonas WHERE id_distrito = ?");
                    $stmt->execute([$persona['distrito']]); // Filtrar por el distrito actual
                    while ($zona = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($zona['id'] == $persona['zona']) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($zona['id']) . "' $selected>" . htmlspecialchars($zona['nombre']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Combo de Tipo de Trámite -->
            <div class="form-group">
                <label for="tipo_tramite">Tipo de Trámite:</label>
                <select name="tipo_tramite" id="tipo_tramite" class="form-control" required>
                    <option value="">Seleccione un tipo de trámite</option>
                    <?php
                    // Consulta para obtener los tipos de trámite
                    $stmt = $pdo->query("SELECT * FROM tramites");
                    while ($tramite = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($tramite['id'] == $persona['tipo_tramite']) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($tramite['id']) . "' $selected>" . htmlspecialchars($tramite['tipo_tramite']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="x_ini">Coordenada X Inicial:</label>
                <input type="text" name="x_ini" class="form-control" value="<?= htmlspecialchars($persona['x_ini']) ?>" required>
            </div>
            <div class="form-group">
                <label for="y_ini">Coordenada Y Inicial:</label>
                <input type="text" name="y_ini" class="form-control" value="<?= htmlspecialchars($persona['y_ini']) ?>" required>
            </div>
            <div class="form-group">
                <label for="x_fin">Coordenada X Final:</label>
                <input type="text" name="x_fin" class="form-control" value="<?= htmlspecialchars($persona['x_fin']) ?>" required>
            </div>
            <div class="form-group">
                <label for="y_fin">Coordenada Y Final:</label>
                <input type="text" name="y_fin" class="form-control" value="<?= htmlspecialchars($persona['y_fin']) ?>" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="text" name="superficie" class="form-control" value="<?= htmlspecialchars($persona['superficie']) ?>" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Cargar zonas al seleccionar el distrito
            $('#distrito').change(function() {
                var distritoId = $(this).val();
                if (distritoId) {
                    $.ajax({
                        type: 'POST',
                        url: 'obtener_zonas.php', // Archivo para obtener zonas
                        data: { id: distritoId },
                        success: function(response) {
                            $('#zona').html(response); // Actualiza el combo de zonas
                        }
                    });
                } else {
                    $('#zona').html('<option value="">Seleccione una zona</option>'); // Resetea el combo de zonas
                }
            });

            // Cargar zonas al cargar la página, si ya hay un distrito seleccionado
            if ($('#distrito').val()) {
                $('#distrito').change(); // Triggers the change event
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
