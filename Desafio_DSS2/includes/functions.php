
// Asegúrate de que la función obtenerCategorias exista
function obtenerCategorias($conn) {
    $sql = "SELECT id, nombre FROM categories";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
