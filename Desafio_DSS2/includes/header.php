<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Tienda</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
          <a class="navbar-brand" href="../ecomerce/index.php">Mi Tienda</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="../ecomerce/cart.php">
                          Carrito (<span id="cart_count">
                          <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                      </span>)
                      </a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
    <div class="container">
