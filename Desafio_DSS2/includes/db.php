<?php
// includes/db.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the database exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Ensure the tables exist
$conn->query("
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
)");

$conn->query("
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
)");



// Función para obtener categorías
function obtenerCategorias($conn) {
    $sql = "SELECT id, nombre FROM categories";
    $result = $conn->query($sql);
    $categorias = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    }
    return $categorias;
}

// Función para obtener productos de una categoría ordenados por precio ascendente
function obtenerProductosPorCategoria($conn, $categoria_id) {
    $stmt = $conn->prepare("SELECT id, nombre, precio, stock, image_url FROM products WHERE category_id = ? ORDER BY precio ASC");
    $stmt->bind_param("i", $categoria_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
    $stmt->close();
    return $productos;
}

// Función para obtener los datos de un producto en específico
function obtenerProducto($conn, $product_id) {
    $stmt = $conn->prepare("SELECT id, nombre, precio, stock, image_url FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    $stmt->close();
    return $producto;
}

// Ensure this file is included only once in other files
?>
