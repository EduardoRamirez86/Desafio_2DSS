<?php
// add_to_cart.php
session_start();
require(__DIR__ . '/../includes/db.php');  // Ruta absoluta corregida
require(__DIR__ . '/../includes/functions.php');  // Incluir funciones

if (isset($_GET['id']) && isset($_GET['cantidad'])) {
    $product_id = intval($_GET['id']);
    $producto = obtenerProducto($conn, $product_id);
    $cantidad = intval($_GET['cantidad']);
    
    if ($producto) {
        // Inicializar el carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Inicializar el stock en la sesión si no está configurado
        if (!isset($_SESSION['stock'][$product_id])) {
            $_SESSION['stock'][$product_id] = $producto['stock'];
        }
        
         // Verificar si la cantidad solicitada no excede el stock disponible
        if ($_SESSION['stock'][$product_id] >= $cantidad) {
            // Si el producto ya existe en el carrito, sumamos la cantidad
            if (isset($_SESSION['cart'][$product_id])) {
                // Sumamos la cantidad al carrito
                $_SESSION['cart'][$product_id]['cantidad'] += $cantidad;
            } else {
                // Si el producto no está en el carrito, lo agregamos
                $_SESSION['cart'][$product_id] = [
                    'producto' => $producto,
                    'cantidad' => $cantidad
                ];
            }


            // Reducir el stock en la sesión
            $_SESSION['stock'][$product_id] -= $cantidad;
        } else {
            $_SESSION['error'] = "Stock agotado para este producto.";
        }
    }
}

header("Location: index.php");
exit();
?>