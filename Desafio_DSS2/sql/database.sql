-- sql/database.sql

CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- Tabla de categorías
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla de productos
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Insertar categorías de ejemplo
INSERT INTO categories (nombre) VALUES 
('Electrónica'),
('Ropa'),
('Hogar');

-- Insertar productos de ejemplo para cada categoría (al menos 3 por categoría)
-- Electrónica
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(1, 'Smartphone Modelo A', 250.00, 10, 'assets/images/smartphone_a.jpg'),
(1, 'Laptop Modelo B', 500.00, 5, 'assets/images/laptop_b.jpg'),
(1, 'Tablet Modelo C', 300.00, 7, 'assets/images/tablet_c.jpg');

-- Ropa
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(2, 'Camiseta Básica', 15.00, 50, 'assets/images/camiseta.jpg'),
(2, 'Jeans Moderno', 40.00, 20, 'assets/images/jeans.jpg'),
(2, 'Chaqueta Casual', 60.00, 15, 'assets/images/chaqueta.jpg');

-- Hogar
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(3, 'Lámpara de Mesa', 25.00, 30, 'assets/images/lampara.jpg'),
(3, 'Alfombra Decorativa', 80.00, 10, 'assets/images/alfombra.jpg'),
(3, 'Juego de Sábanas', 45.00, 25, 'assets/images/sabanas.jpg');
