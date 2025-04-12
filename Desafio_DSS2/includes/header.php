<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MixSabores</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="p-relative d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 top-0">
      <div class="container">
          <a class="navbar-brand" href="../ecomerce/index.php">MixSabores</a>
          <div class="" id="navbarContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="../ecomerce/cart.php">
                          Carrito <span id="cart_count" class="bg-danger rounded-5 p-2">
                          <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                      </span>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
    <div class="container">
