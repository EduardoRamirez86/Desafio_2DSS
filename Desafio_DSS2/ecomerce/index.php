<?php
include('../includes/db.php');
include('../includes/functions.php');
include('../includes/header.php');

$categorias = obtenerCategorias($conn);
?>

<?php include('../includes/principal.php'); ?>

<div id="main-content">
<h1 class="py-5">Categorías de Productos</h1>


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
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-center mb-2">
                                <button class="col-2 border-0 btn-secondary" type="button" onclick="cambiarCantidad(<?php echo $producto['id']; ?>, -1)">-</button>
                                <input 
                                    class="col-3 border-0 text-center"
                                    id="cantidad-<?php echo $producto['id']; ?>"
                                    type="number"
                                    max="<?php echo $_SESSION['stock'][$producto['id']]; ?>"
                                    min="1"
                                    value="1"
                                    readonly
                                >
                                <button class="col-2 border-0 btn-primary" type="button" onclick="cambiarCantidad(<?php echo $producto['id']; ?>, 1)">+</button>
                            </div>
                            <a href="javascript:void(0)"
                            onclick="window.location.href = 'add_to_cart.php?id=<?php echo $producto['id']; ?>&cantidad=' + document.getElementById('cantidad-<?php echo $producto['id']; ?>').value;"  
                            class="btn btn-primary m-auto">
                            
                            Agregar al carrito
                        
                            </a>
                        </div>
                        
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
</div>

<?php
// Correct the include path
include '../includes/footer.php';
$conn->close();
?>
<script>
  function cambiarCantidad(id, delta) {
    const input = document.getElementById(`cantidad-${id}`);
    const min = parseInt(input.min);
    const max = parseInt(input.max);
    let valorActual = parseInt(input.value);

    if (isNaN(valorActual)) valorActual = min;

    let nuevoValor = valorActual + delta;

    if (nuevoValor >= min && nuevoValor <= max) {
      input.value = nuevoValor;
    }
  }

  function agregarAlCarrito(id) {
    const cantidadInput = document.getElementById(`cantidad-${id}`);
    const cantidad = cantidadInput.value;

    // Redirigimos con la cantidad dinámica
    window.location.href = `add_to_cart.php?id=${id}&cantidad=${cantidad}`;
}
</script>
