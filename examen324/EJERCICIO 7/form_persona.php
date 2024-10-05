<?php
include 'conexion.php';

// Verifica si se recibió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci']; // Obtener CI de la persona
    $nombre = $_POST['nombre']; // Obtener nombre
    $paterno = $_POST['paterno']; // Obtener apellido paterno
    $x_ini = $_POST['x_ini']; // Obtener coordenada X inicial
    $y_ini = $_POST['y_ini']; // Obtener coordenada Y inicial
    $x_fin = $_POST['x_fin']; // Obtener coordenada X final
    $y_fin = $_POST['y_fin']; // Obtener coordenada Y final
    $superficie = $_POST['superficie']; // Obtener superficie
    $distrito = $_POST['distrito']; // Obtener distrito
    $zona = $_POST['zona']; // Obtener zona
    $tipo_tramite = $_POST['tipo_tramite']; // Obtener tipo de trámite

    try {
        // Registrar a la persona
        $stmtPersona = $pdo->prepare("INSERT INTO Persona (ci, nombre, paterno) VALUES (:ci, :nombre, :paterno)");
        $stmtPersona->bindParam(':ci', $ci);
        $stmtPersona->bindParam(':nombre', $nombre);
        $stmtPersona->bindParam(':paterno', $paterno);
        $stmtPersona->execute();

        // Registrar al usuario normal en la tabla usuarios
        $stmtUsuario = $pdo->prepare("INSERT INTO usuarios (ci_persona, contrasena, rol) VALUES (:ci_persona, :contrasena, :rol)");
        $contrasena = $ci; // Usamos el CI como contraseña (no encriptada)
        $rol = 'usuario_normal'; // Rol del usuario normal
        $stmtUsuario->bindParam(':ci_persona', $ci);
        $stmtUsuario->bindParam(':contrasena', $contrasena);
        $stmtUsuario->bindParam(':rol', $rol);
        $stmtUsuario->execute();

        // Obtener el ID del tipo de trámite
        $stmtTramite = $pdo->prepare("SELECT id FROM Tramites WHERE tipo_tramite = :tipo_tramite");
        $stmtTramite->bindParam(':tipo_tramite', $tipo_tramite);
        $stmtTramite->execute();
        $id_tramite = $stmtTramite->fetchColumn();

        // Registrar la propiedad en la tabla catastro con distrito, zona y id_tramite
        $stmtCatastro = $pdo->prepare("INSERT INTO Catastro (ci_persona, x_ini, y_ini, x_fin, y_fin, superficie, distrito, id_zona, id_tramite) 
                                        VALUES (:ci_persona, :x_ini, :y_ini, :x_fin, :y_fin, :superficie, :distrito, :id_zona, :id_tramite)");
        $stmtCatastro->bindParam(':ci_persona', $ci);
        $stmtCatastro->bindParam(':x_ini', $x_ini);
        $stmtCatastro->bindParam(':y_ini', $y_ini);
        $stmtCatastro->bindParam(':x_fin', $x_fin);
        $stmtCatastro->bindParam(':y_fin', $y_fin);
        $stmtCatastro->bindParam(':superficie', $superficie);
        $stmtCatastro->bindParam(':distrito', $distrito);
        $stmtCatastro->bindParam(':id_zona', $zona); // Asegúrate de que 'zona' sea el ID de la zona
        $stmtCatastro->bindParam(':id_tramite', $id_tramite); // Asocia el ID del trámite
        $stmtCatastro->execute();

        // Redirigir a listar_personas.php después de guardar
        header("Location: listar_personas.php");
        exit;
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al registrar: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Persona</h2>
        <form action="" method="post"> <!-- Se modifica para enviar al mismo archivo -->
            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" name="ci" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" name="paterno" class="form-control" required>
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
                        echo "<option value='" . htmlspecialchars($distrito['id']) . "'>" . htmlspecialchars($distrito['nombre']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Combo de Zona -->
            <div class="form-group">
                <label for="zona">Zona:</label>
                <select name="zona" id="zona" class="form-control" required>
                    <option value="">Seleccione una zona</option>
                </select>
            </div>

            <!-- Combo de Tipo de Trámite -->
            <div class="form-group">
                <label for="tipo_tramite">Tipo de Trámite:</label>
                <select name="tipo_tramite" id="tipo_tramite" class="form-control" required>
                    <option value="">Seleccione un tipo de trámite</option>
                    <?php
                    // Consulta para obtener los tipos de trámite
                    $stmt = $pdo->query("SELECT * FROM Tramites");
                    while ($tramite = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . htmlspecialchars($tramite['tipo_tramite']) . "'>" . htmlspecialchars($tramite['tipo_tramite']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="x_ini">Coordenada X Inicial:</label>
                <input type="text" name="x_ini" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="y_ini">Coordenada Y Inicial:</label>
                <input type="text" name="y_ini" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="x_fin">Coordenada X Final:</label>
                <input type="text" name="x_fin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="y_fin">Coordenada Y Final:</label>
                <input type="text" name="y_fin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="text" name="superficie" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Evento de cambio en el combo de distritos
            $('#distrito').change(function() {
                var distritoId = $(this).val();
                if (distritoId) {
                    $.ajax({
                        type: 'POST',
                        url: 'obtener_zonas.php', // Crea este archivo para obtener zonas según el distrito
                        data: 'id=' + distritoId,
                        success: function(html) {
                            $('#zona').html(html);
                        }
                    });
                } else {
                    $('#zona').html('<option value="">Seleccione una zona</option>');
                }
            });
        });
    </script>
</body>
</html>
