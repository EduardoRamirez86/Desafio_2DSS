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

-- Insertar productos con URLs reales de imágenes
-- Electrónica
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(1, 'Smartphone Modelo A', 250.00, 10, 'https://picsum.photos/200/300?random=1'),
(1, 'Laptop Modelo B', 500.00, 5, 'https://picsum.photos/200/300?random=2'),
(1, 'Tablet Modelo C', 300.00, 7, 'https://picsum.photos/200/300?random=3');

-- Ropa
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(2, 'Camiseta Básica', 15.00, 50, 'https://picsum.photos/200/300?random=4'),
(2, 'Jeans Moderno', 40.00, 20, 'https://picsum.photos/200/300?random=5'),
(2, 'Chaqueta Casual', 60.00, 15, 'https://picsum.photos/200/300?random=6');

-- Hogar
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(3, 'Lámpara de Mesa', 25.00, 30, 'https://picsum.photos/200/300?random=7'),
(3, 'Alfombra Decorativa', 80.00, 10, 'https://picsum.photos/200/300?random=8'),
(3, 'Juego de Sábanas', 45.00, 25, 'https://picsum.photos/200/300?random=9');