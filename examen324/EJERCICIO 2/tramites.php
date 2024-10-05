<?php
include 'conexion.php';

// Obtener todos los tipos de trámites
$stmt = $pdo->query("SELECT * FROM Tramites");
$tramites = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
