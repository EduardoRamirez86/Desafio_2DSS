<?php
// remove_from_cart.php
session_start();

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$product_id])) {
        $cantidad = $_SESSION['cart'][$product_id]['cantidad'];

        // Restaurar el stock en la sesión
        $_SESSION['stock'][$product_id] += $cantidad;

        // Eliminar el producto del carrito
        unset($_SESSION['cart'][$product_id]);
    }
}

header("Location: cart.php");
exit();
?>
