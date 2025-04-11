<?php
// process_checkout.php


// Función para validar con regex
function validar($campo, $regex) {
    return preg_match($regex, $campo);
}

// Recibir datos del formulario
$buyer_name  = trim($_POST['buyer_name']);
$dui         = trim($_POST['dui']);
$card_number = trim($_POST['card_number']);
$exp_date    = trim($_POST['exp_date']);
$buyer_email = trim($_POST['buyer_email']);

// Validaciones
$errores = [];

// Nombre (solo letras y espacios, 3-50 caracteres)
if (!validar($buyer_name, "/^[a-zA-Z\s]{3,50}$/")) {
    $errores[] = "Nombre inválido.";
}

// DUI: 8 dígitos, guión y 1 dígito
if (!validar($dui, "/^\d{8}-\d$/")) {
    $errores[] = "DUI inválido.";
}

// Número de tarjeta: 4 grupos de 4 dígitos separados por guiones
if (!validar($card_number, "/^\d{4}-\d{4}-\d{4}-\d{4}$/")) {
    $errores[] = "Número de tarjeta inválido.";
}

// Fecha de vencimiento: MM/AA
if (!validar($exp_date, "/^(0[1-9]|1[0-2])\/\d{2}$/")) {
    $errores[] = "Fecha de vencimiento inválida.";
}

// Email
if (!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Correo inválido.";
}

include("includes/header.php");

if (!empty($errores)) {
    echo "<h2>Se encontraron los siguientes errores:</h2><ul>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo '<a href="checkout.php" class="btn btn-warning">Regresar</a>';
} else {
    // Simulación exitosa
    echo "<h2>Compra simulada con éxito</h2>";
    echo "<p>Gracias por su compra, $buyer_name.</p>";
    // Opcional: limpiar el carrito tras la simulación
    unset($_SESSION['cart']);
    echo '<a href="index.php" class="btn btn-primary">Volver a la tienda</a>';
}

include("includes/footer.php");
?>
