-- Crear la base de datos y usarla
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- ================== TABLA DE CATEGORÍAS ================== --
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- ================== TABLA DE PRODUCTOS ================== --
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- ================== INSERTAR CATEGORÍAS ================== --
INSERT INTO categories (nombre) VALUES 
('Electrónica'),
('Ropa'),
('Hogar'),
('Deportes'),
('Belleza'),
('Libros');

-- ================== INSERTAR PRODUCTOS ================== --

-- Categoría 1: Electrónica
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(1, 'Smartphone Modelo A', 250.00, 10, 'https://source.unsplash.com/featured/?smartphone'),
(1, 'Laptop Modelo B', 500.00, 5, 'https://source.unsplash.com/featured/?laptop'),
(1, 'Tablet Modelo C', 300.00, 7, 'https://source.unsplash.com/featured/?tablet'),
(1, 'Smartwatch Modelo D', 150.00, 12, 'https://source.unsplash.com/featured/?smartwatch'),
(1, 'Cámara Digital Modelo E', 400.00, 8, 'https://source.unsplash.com/featured/?camera');

-- Categoría 2: Ropa
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(2, 'Camiseta Básica', 15.00, 50, 'https://source.unsplash.com/featured/?tshirt'),
(2, 'Jeans Moderno', 40.00, 20, 'https://source.unsplash.com/featured/?jeans'),
(2, 'Chaqueta Casual', 60.00, 15, 'https://source.unsplash.com/featured/?jacket'),
(2, 'Vestido Elegante', 80.00, 10, 'https://source.unsplash.com/featured/?dress'),
(2, 'Zapatos Deportivos', 70.00, 25, 'https://source.unsplash.com/featured/?shoes');

-- Categoría 3: Hogar
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(3, 'Lámpara de Mesa', 25.00, 30, 'https://source.unsplash.com/featured/?lamp'),
(3, 'Alfombra Decorativa', 80.00, 10, 'https://source.unsplash.com/featured/?carpet'),
(3, 'Juego de Sábanas', 45.00, 25, 'https://source.unsplash.com/featured/?sheets'),
(3, 'Sofá Moderno', 750.00, 3, 'https://source.unsplash.com/featured/?sofa'),
(3, 'Mesa de Centro', 150.00, 8, 'https://source.unsplash.com/featured/?coffee-table');

-- Categoría 4: Deportes
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(4, 'Bicicleta de Montaña', 300.00, 6, 'https://source.unsplash.com/featured/?mountain-bike'),
(4, 'Raqueta de Tenis', 85.00, 15, 'https://source.unsplash.com/featured/?tennis-racket'),
(4, 'Pelota de Fútbol', 25.00, 40, 'https://source.unsplash.com/featured/?soccer-ball'),
(4, 'Zapatillas Deportivas', 90.00, 20, 'https://source.unsplash.com/featured/?sports-shoes'),
(4, 'Camiseta Deportiva', 30.00, 35, 'https://source.unsplash.com/featured/?sportswear');

-- Categoría 5: Belleza
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(5, 'Perfume Floral', 55.00, 18, 'https://source.unsplash.com/featured/?perfume'),
(5, 'Crema Facial', 35.00, 22, 'https://source.unsplash.com/featured/?facial-cream'),
(5, 'Labial Elegante', 20.00, 40, 'https://source.unsplash.com/featured/?lipstick'),
(5, 'Set de Maquillaje', 90.00, 10, 'https://source.unsplash.com/featured/?makeup'),
(5, 'Secador de Pelo', 120.00, 7, 'https://source.unsplash.com/featured/?hair-dryer');

-- Categoría 6: Libros
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(6, 'Novela de Misterio', 18.00, 35, 'https://source.unsplash.com/featured/?mystery-book'),
(6, 'Libro de Cocina', 22.00, 20, 'https://source.unsplash.com/featured/?cookbook'),
(6, 'Manual de Programación', 30.00, 12, 'https://source.unsplash.com/featured/?programming-book'),
(6, 'Libro de Historia', 25.00, 18, 'https://source.unsplash.com/featured/?history-book'),
(6, 'Libro Infantil', 15.00, 40, 'https://source.unsplash.com/featured/?children-book');

-- Eliminar el campo reserved_stock de la tabla products
ALTER TABLE products DROP COLUMN reserved_stock;
