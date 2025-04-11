</div> <!-- Cierre del container -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
<footer>
    <p>&copy; <?php echo date('Y'); ?> Mi Tienda. Todos los derechos reservados.</p>
</footer>
<script>
  const toggle = document.createElement("button");
  toggle.className = "toggle-dark btn btn-secondary";
  toggle.innerText = "🌙 Modo Oscuro";
  document.body.appendChild(toggle);

  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    toggle.innerText = document.body.classList.contains("dark-mode")
      ? "☀️ Modo Claro"
      : "🌙 Modo Oscuro";
  });
</script>
</body>
</html>