</div> <!-- Cierre del container -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
<footer>
    <p>&copy; <?php echo date('Y'); ?> Mi Tienda. Todos los derechos reservados.</p>
</footer>
<script>
  // Cargar el estado del modo oscuro desde localStorage
  document.addEventListener("DOMContentLoaded", () => {
    const isDarkMode = localStorage.getItem("dark-mode") === "true";
    if (isDarkMode) {
      document.body.classList.add("dark-mode");
    }

    const toggle = document.createElement("button");
    toggle.className = "toggle-dark btn btn-secondary";
    toggle.innerText = isDarkMode ? "☀️ Modo Claro" : "🌙 Modo Oscuro";
    document.body.appendChild(toggle);

    toggle.addEventListener("click", () => {
      const isDark = document.body.classList.toggle("dark-mode");
      localStorage.setItem("dark-mode", isDark); // Guardar el estado en localStorage
      toggle.innerText = isDark ? "☀️ Modo Claro" : "🌙 Modo Oscuro";
    });
  });
</script>
</body>
</html>