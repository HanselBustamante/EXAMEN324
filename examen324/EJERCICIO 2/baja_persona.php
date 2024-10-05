<?php
include 'conexion.php';

$ci = $_GET['ci'];

try {
    // Eliminar usuario asociado
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE ci_persona = ?");
    $stmt->execute([$ci]);

    // Eliminar propiedad asociada
    $stmt = $pdo->prepare("DELETE FROM Catastro WHERE ci_persona = ?");
    $stmt->execute([$ci]);

    // Eliminar persona
    $stmt = $pdo->prepare("DELETE FROM Persona WHERE ci = ?");
    $stmt->execute([$ci]);

    echo "<div class='alert alert-success'>Persona eliminada exitosamente.</div>";
    echo "<a href='listar_personas.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>
