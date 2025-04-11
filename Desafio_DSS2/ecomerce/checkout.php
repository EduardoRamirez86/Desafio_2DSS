<?php
// checkout.php
include("includes/header.php");
?>

<h1>Simulación de Compra</h1>
<form action="process_checkout.php" method="POST" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="buyer_name">Nombre del Comprador</label>
        <input type="text" name="buyer_name" id="buyer_name" class="form-control" required
               pattern="^[a-zA-Z\s]{3,50}$" 
               title="Ingrese un nombre válido (solo letras y espacios, entre 3 y 50 caracteres)">
    </div>
    <div class="form-group">
        <label for="dui">DUI</label>
        <input type="text" name="dui" id="dui" class="form-control" required
               pattern="^\d{8}-\d$" 
               title="Formato DUI: 12345678-9">
    </div>
    <div class="form-group">
        <label for="card_number">Número de Tarjeta</label>
        <input type="text" name="card_number" id="card_number" class="form-control" required
               pattern="^\d{4}-\d{4}-\d{4}-\d{4}$"
               title="Formato: 1234-5678-9012-3456">
    </div>
    <div class="form-group">
        <label for="exp_date">Fecha de Vencimiento</label>
        <input type="text" name="exp_date" id="exp_date" class="form-control" required
               pattern="^(0[1-9]|1[0-2])\/\d{2}$" 
               title="Formato MM/AA (ejemplo: 09/25)">
    </div>
    <div class="form-group">
        <label for="buyer_email">Correo del Comprador</label>
        <input type="email" name="buyer_email" id="buyer_email" class="form-control" required
               pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="Ingrese un correo válido">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Finalizar Compra</button>
</form>

<script>
// Ejemplo básico de validación de Bootstrap
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php include("includes/footer.php"); ?>
