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
-- Electrónica (Categoría 1)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(1, 'Smartphone Modelo A', 250.00, 10, 'https://images.unsplash.com/photo-1605170439002-90845e8c0137'),
(1, 'Laptop Modelo B', 500.00, 5, 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853'),
(1, 'Tablet Modelo C', 300.00, 7, 'https://images.unsplash.com/photo-1544244011-77a1c8553936'),
(1, 'Smartwatch Modelo D', 150.00, 12, 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a'),
(1, 'Cámara Digital Modelo E', 400.00, 8, 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32');

-- Ropa (Categoría 2)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(2, 'Camiseta Básica', 15.00, 50, 'https://images.unsplash.com/photo-1581655353564-df123a1eb820'),
(2, 'Jeans Moderno', 40.00, 20, 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246'),
(2, 'Chaqueta Casual', 60.00, 15, 'https://images.unsplash.com/photo-1551028719-00167b16eac5'),
(2, 'Vestido Elegante', 80.00, 10, 'https://images.unsplash.com/photo-1572804013427-4d7ca7268217'),
(2, 'Zapatos Deportivos', 70.00, 25, 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2');

-- Hogar (Categoría 3)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(3, 'Lámpara de Mesa', 25.00, 30, 'https://images.unsplash.com/photo-1580477667995-2b94f01c9516'),
(3, 'Alfombra Decorativa', 80.00, 10, 'https://images.unsplash.com/photo-1604627870781-56ee155d6e4a'),
(3, 'Juego de Sábanas', 45.00, 25, 'https://images.unsplash.com/photo-1582582621959-48d27397dc69'),
(3, 'Sofá Moderno', 750.00, 3, 'https://images.unsplash.com/photo-1555041469-586a2148d792'),
(3, 'Mesa de Centro', 150.00, 8, 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92');

-- Deportes (Categoría 4)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(4, 'Bicicleta de Montaña', 300.00, 6, 'https://images.unsplash.com/photo-1485965120184-e220f721d03e'),
(4, 'Raqueta de Tenis', 85.00, 15, 'https://images.unsplash.com/photo-1575361204480-aadea25e6e68'),
(4, 'Pelota de Fútbol', 25.00, 40, 'https://images.unsplash.com/photo-1614632537197-38d0abc8a019'),
(4, 'Zapatillas Deportivas', 90.00, 20, 'https://images.unsplash.com/photo-1542291026-7eec264c27ff'),
(4, 'Camiseta Deportiva', 30.00, 35, 'https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb');

-- Belleza (Categoría 5)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(5, 'Perfume Floral', 55.00, 18, 'https://images.unsplash.com/photo-1615228938090-6ee30d233c5c'),
(5, 'Crema Facial', 35.00, 22, 'https://images.unsplash.com/photo-1620916297395-335b1bf5b932'),
(5, 'Labial Elegante', 20.00, 40, 'https://images.unsplash.com/photo-1586495777744-4413f21062fa'),
(5, 'Set de Maquillaje', 90.00, 10, 'https://images.unsplash.com/photo-1596462502278-27bfdc403348'),
(5, 'Secador de Pelo', 120.00, 7, 'https://images.unsplash.com/photo-1596703261355-140f20c0c6ad');

-- Libros (Categoría 6)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(6, 'Novela de Misterio', 18.00, 35, 'https://images.unsplash.com/photo-1544947950-fa07a98d237f'),
(6, 'Libro de Cocina', 22.00, 20, 'https://images.unsplash.com/photo-1506880018603-83d5b814b5a6'),
(6, 'Manual de Programación', 30.00, 12, 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6'),
(6, 'Libro de Historia', 25.00, 18, 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d'),
(6, 'Libro Infantil', 15.00, 40, 'https://images.unsplash.com/photo-1579281401167-48deeabf23b9');