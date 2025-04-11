<?php
include('../includes/db.php');
include('../includes/functions.php');
include('../includes/header.php');

$categorias = obtenerCategorias($conn);
?>

<h1 class="mb-4">Categorías de Productos</h1>

<?php foreach ($categorias as $categoria): ?>
    <h2><?php echo $categoria['nombre']; ?></h2>
    <div class="row mb-4">
    <?php 
      // Obtener productos de la categoría actual
      $productos = obtenerProductosPorCategoria($conn, $categoria['id']);
      if (count($productos) > 0):
         foreach ($productos as $producto):
    ?>
    <?php
    // Sincronizar el stock en la sesión con el stock de la base de datos si no está configurado
    if (!isset($_SESSION['stock'][$producto['id']])) {
        $_SESSION['stock'][$producto['id']] = $producto['stock'];
    }
    ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="<?php echo $producto['image_url']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                    <p class="card-text">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                    <p class="card-text">Stock: <?php echo $_SESSION['stock'][$producto['id']]; ?></p>
                    <?php if ($_SESSION['stock'][$producto['id']] > 0): ?>
                        <a href="add_to_cart.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary">Agregar al carrito</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled>Sold Out</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php 
         endforeach;
      else:
         echo "<p>No hay productos en esta categoría.</p>";
      endif;
    ?>
    </div>
<?php endforeach; ?>

<?php
// Correct the include path
include '../includes/footer.php';
$conn->close();
?>
