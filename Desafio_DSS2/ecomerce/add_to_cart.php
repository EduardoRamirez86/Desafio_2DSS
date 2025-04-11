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

        // Inicializar el stock en la sesión si no está configurado
        if (!isset($_SESSION['stock'][$product_id])) {
            $_SESSION['stock'][$product_id] = $producto['stock'];
        }
        
        // Validar stock en la sesión
        $cantidad_actual = $_SESSION['cart'][$product_id]['cantidad'] ?? 0;
        if ($_SESSION['stock'][$product_id] > 0) {
            $_SESSION['cart'][$product_id] = [
                'producto' => $producto,
                'cantidad' => $cantidad_actual + 1
            ];

            // Reducir el stock en la sesión
            $_SESSION['stock'][$product_id]--;
        } else {
            $_SESSION['error'] = "Stock agotado para este producto.";
        }
    }
}

header("Location: index.php");
exit();
?>