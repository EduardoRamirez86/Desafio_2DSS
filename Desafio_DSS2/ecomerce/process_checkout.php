<?php
// process_checkout.php

require(__DIR__ . '/../includes/db.php');
require(__DIR__ . '/../includes/functions.php');

// Validar existencia de datos POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: checkout.php");
    exit();
}

// Función de validación (mejor en functions.php)
function validar($campo, $regex) {
    return preg_match($regex, $campo);
}

// Sanitizar y obtener datos
$buyer_name  = filter_input(INPUT_POST, 'buyer_name');
$dui         = filter_input(INPUT_POST, 'dui');
$card_number = filter_input(INPUT_POST, 'card_number');
$exp_date    = filter_input(INPUT_POST, 'exp_date');
$buyer_email = filter_input(INPUT_POST, 'buyer_email', FILTER_SANITIZE_EMAIL);

// Validaciones
$errores = [];

if (!validar($buyer_name, "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/")) {
    $errores[] = "Nombre inválido (solo letras y espacios)";
}

if (!validar($dui, "/^\d{8}-\d$/")) {
    $errores[] = "Formato DUI incorrecto (12345678-9)";
}

if (!validar($card_number, "/^\d{4}-\d{4}-\d{4}-\d{4}$/")) {
    $errores[] = "Tarjeta inválida (use 16 dígitos con guiones)";
}

if (!validar($exp_date, "/^(0[1-9]|1[0-2])\/\d{2}$/")) {
    $errores[] = "Fecha debe ser MM/AA (ej: 12/25)";
}

if (!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Correo electrónico inválido";
}

// Incluir cabecera después de procesamiento
require(__DIR__ . '/../includes/header.php');
?>

<div class="container mt-5">
    <?php if (!empty($errores)): ?>
        <div class="alert alert-danger">
            <h4>Errores encontrados:</h4>
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="checkout.php" class="btn btn-warning">Corregir Datos</a>
        </div>
    <?php else: ?>
        <div class="alert alert-success">
            <h2>✅ Compra realizada exitosamente</h2>
            <p class="lead">Gracias por su compra, <strong><?= htmlspecialchars($buyer_name) ?></strong></p>
            <p>Recibirá un correo de confirmación en: <em><?= htmlspecialchars($buyer_email) ?></em></p>
            
            <?php 
            // Disminuir el stock real
            foreach ($_SESSION['cart'] as $id => $item) {
                $cantidad = $item['cantidad'];

                $stmt = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
                $stmt->bind_param("ii", $cantidad, $id);
                $stmt->execute();
                $stmt->close();
            }

            // Limpiar carrito
            unset($_SESSION['cart']); 
            ?>
            
            <a href="index.php" class="btn btn-primary">Volver a la Tienda</a>
        </div>
    <?php endif; ?>
</div>

<?php require(__DIR__ . '/../includes/footer.php'); ?>