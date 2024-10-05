<?php
include 'conexion.php';

// Capturar los datos del formulario
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$zona = $_POST['zona'];
$x_ini = $_POST['x_ini'];
$y_ini = $_POST['y_ini'];
$x_fin = $_POST['x_fin'];
$y_fin = $_POST['y_fin'];
$superficie = $_POST['superficie'];
$distrito = $_POST['distrito'];
$id_tramite = $_POST['tipo_tramite']; // Cambiado de $tipo_tramite a $id_tramite

try {
    // Actualizar persona
    $stmt = $pdo->prepare("UPDATE Persona SET nombre = ?, paterno = ? WHERE ci = ?");
    $stmt->execute([$nombre, $paterno, $ci]);

    // Actualizar catastro con el id_tramite
    $stmt = $pdo->prepare("UPDATE Catastro SET zona = ?, x_ini = ?, y_ini = ?, x_fin = ?, y_fin = ?, superficie = ?, distrito = ?, id_tramite = ? WHERE ci_persona = ?");
    $stmt->execute([$zona, $x_ini, $y_ini, $x_fin, $y_fin, $superficie, $distrito, $id_tramite, $ci]); // Añadido id_tramite

    echo "<div class='alert alert-success'>Datos actualizados exitosamente.</div>";
    echo "<a href='listar_personas.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>
