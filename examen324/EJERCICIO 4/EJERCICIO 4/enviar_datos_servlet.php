<?php
session_start();

// Obtener el ID del catastro de la sesión
if (isset($_SESSION['catastro_id'])) {
    $catastro_id = $_SESSION['catastro_id'];

    // Configurar la URL del servlet de Java (ajusta la ruta según tu servidor Tomcat)
    $servlet_url = "http://localhost:8080/INF324/EJERCICIO4?catastroId=" . $catastro_id;

    // Enviar solicitud GET al servlet
    $respuesta = file_get_contents($servlet_url);

    // Redirigir a la página del resultado, pasando el resultado como parámetro GET
    header("Location: resultado_impuesto.php?impuesto=" . urlencode($respuesta));
    exit();
} else {
    echo "Error: No se encontró el ID del catastro.";
}
?>
