<?php
// add_to_cart.php
session_start();
require(__DIR__ . '/../includes/db.php');  // Ruta absoluta corregida
require(__DIR__ . '/../includes/functions.php');  // Incluir funciones

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $producto = obtenerProducto($conn, $product_id);
    
    if ($producto) {
        // Inicializar el carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Validar stock
        $cantidad_actual = $_SESSION['cart'][$product_id]['cantidad'] ?? 0;
        if ($cantidad_actual < $producto['stock']) {
            $_SESSION['cart'][$product_id] = [
                'producto' => $producto,
                'cantidad' => $cantidad_actual + 1
            ];
        } else {
            $_SESSION['error'] = "Stock excedido. Máximo disponible: " . $producto['stock'];
        }
    }
}

header("Location: index.php");
exit();
?>