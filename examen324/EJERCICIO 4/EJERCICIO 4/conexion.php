<?php
$host = 'localhost';
$db = 'BDHansel';
$user = 'root'; // Cambia esto si es necesario
$pass = ''; // Cambia esto si es necesario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
