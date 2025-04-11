<?php
// checkout.php

require(__DIR__ . '/../includes/db.php');
require(__DIR__ . '/../includes/functions.php');
require(__DIR__ . '/../includes/header.php');
?>

<div class="container mt-5">
    <h1 class="mb-4">Simulación de Compra</h1>
    
    <!-- Mostrar mensajes de error -->
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="process_checkout.php" method="POST" class="needs-validation" novalidate>
        <!-- Nombre -->
        <div class="mb-3">
            <label for="buyer_name" class="form-label">Nombre del Comprador</label>
            <input type="text" class="form-control" name="buyer_name" id="buyer_name" 
                   pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$" required>
            <div class="invalid-feedback">Ingrese un nombre válido (3-50 caracteres)</div>
        </div>

        <!-- DUI -->
        <div class="mb-3">
            <label for="dui" class="form-label">DUI</label>
            <input type="text" class="form-control" name="dui" id="dui" 
                   pattern="^\d{8}-\d{1}$" placeholder="Ejemplo: 12345678-9" required>
            <div class="invalid-feedback">Formato requerido: 12345678-9</div>
        </div>

        <!-- Tarjeta -->
        <div class="mb-3">
            <label for="card_number" class="form-label">Número de Tarjeta</label>
            <input type="text" class="form-control" name="card_number" id="card_number" 
                   pattern="^\d{4}-\d{4}-\d{4}-\d{4}$" placeholder="Ejemplo: 1234-5678-9012-3456" required>
            <div class="invalid-feedback">Formato inválido (use 16 dígitos con guiones)</div>
        </div>

        <!-- Fecha Expiración -->
        <div class="mb-3">
            <label for="exp_date" class="form-label">Fecha de Vencimiento</label>
            <input type="text" class="form-control" name="exp_date" id="exp_date" 
                   pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/AA" required>
            <div class="invalid-feedback">Formato MM/AA (ej: 12/25)</div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="buyer_email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="buyer_email" id="buyer_email" 
                   pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="invalid-feedback">Correo electrónico inválido</div>
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100 mt-4">
            <i class="bi bi-credit-card"></i> Finalizar Compra
        </button>
    </form>
</div>

<script>
// Validación de formulario mejorada
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.needs-validation');
    
    forms.forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        
        // Validación en tiempo real
        form.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
            });
        });
    });
});
</script>

<?php require(__DIR__ . '/../includes/footer.php'); ?>
