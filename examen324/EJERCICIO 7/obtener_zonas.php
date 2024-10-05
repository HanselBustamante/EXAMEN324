<?php
include 'conexion.php';

if (isset($_POST['id'])) {
    $distrito_id = $_POST['id'];
    $stmt = $pdo->prepare("SELECT id, nombre FROM zonas WHERE id_distrito = :id_distrito");
    $stmt->bindParam(':id_distrito', $distrito_id);
    $stmt->execute();

    $options = "<option value=''>Seleccione una zona</option>";
    while ($zona = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options .= "<option value='" . htmlspecialchars($zona['id']) . "'>" . htmlspecialchars($zona['nombre']) . "</option>";
    }

    echo $options;
}
?>
