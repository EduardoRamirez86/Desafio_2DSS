<?php
// remove_from_cart.php
session_start(); // Asegúrate de iniciar la sesión

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]); // Eliminar el producto del carrito
    }
}

header("Location: cart.php"); // Redirigir de vuelta al carrito
exit();
?>
