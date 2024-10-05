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
    // Insertar en Persona
    $stmt = $pdo->prepare("INSERT INTO Persona (ci, nombre, paterno) VALUES (?, ?, ?)");
    $stmt->execute([$ci, $nombre, $paterno]);

    // Insertar en Catastro con el id_tramite
    $stmt = $pdo->prepare("INSERT INTO Catastro (zona, x_ini, y_ini, x_fin, y_fin, superficie, ci_persona, distrito, id_tramite) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$zona, $x_ini, $y_ini, $x_fin, $y_fin, $superficie, $ci, $distrito, $id_tramite]); // Añadido id_tramite

    echo "<div class='alert alert-success'>Persona registrada exitosamente.</div>";
    echo "<a href='listar_personas.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>
