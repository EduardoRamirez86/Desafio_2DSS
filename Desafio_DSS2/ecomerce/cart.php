<?php
// cart.php

include("../includes/header.php");
?>

<h1>Tu Carrito de Compras</h1>

<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_carrito = 0;
        foreach ($_SESSION['cart'] as $id => $item):
            $subtotal = $item['producto']['precio'] * $item['cantidad'];
            $total_carrito += $subtotal;
        ?>
        <tr>
            <td><?php echo $item['producto']['nombre']; ?></td>
            <td>$<?php echo number_format($item['producto']['precio'], 2); ?></td>
            <td><?php echo $item['cantidad']; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
            <td><a href="remove_from_cart.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" class="text-right"><strong>Total Carrito:</strong></td>
            <td colspan="2">$<?php echo number_format($total_carrito, 2); ?></td>
        </tr>
    </tbody>
</table>
<a href="checkout.php" class="btn btn-success">Proceder a Comprar</a>
<?php else: ?>
    <p>Tu carrito está vacío.</p>
<?php endif; ?>

<?php include("../includes/footer.php"); ?>
