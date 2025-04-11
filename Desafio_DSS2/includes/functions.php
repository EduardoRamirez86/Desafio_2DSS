<?php
// Asegúrate de que la función obtenerCategorias exista

if (!function_exists('obtenerCategorias')) {
    function obtenerCategorias($conn) {
        $sql = "SELECT id, nombre FROM categories";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
