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
-- PEGAR EN LA BASE DE DATOS PARA CARGAR DATOS INICIALES
-- Refrescos (Categoría 1)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(1, 'Refresco de Cola 500ml', 1.25, 100, 'https://images.unsplash.com/photo-1603398938378-cdd9e61a3f3b'),
(1, 'Jugo Natural de Naranja 330ml', 1.50, 80, 'https://images.unsplash.com/photo-1582719478250-dc7f8cfa9c87'),
(1, 'Té Helado Limón 350ml', 1.10, 90, 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e'),
(1, 'Bebida Energética 250ml', 1.75, 60, 'https://images.unsplash.com/photo-1585314064901-bfbbeff38159'),
(1, 'Agua Mineral 600ml', 0.90, 120, 'https://images.unsplash.com/photo-1550565101-a2b12e9b4fa0');
-- Comida (Categoría 2)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(2, 'Papas Fritas Clásicas 150g', 1.60, 100, 'https://images.unsplash.com/photo-1604908177225-6a7bd43b6243'),
(2, 'Tostaditas de Maíz 120g', 1.40, 85, 'https://images.unsplash.com/photo-1589308078050-9720756a68c2'),
(2, 'Galletas Saladas 200g', 1.30, 90, 'https://images.unsplash.com/photo-1616099321024-53c659f5a122'),
(2, 'Nueces Mixtas 100g', 2.50, 70, 'https://images.unsplash.com/photo-1628172150576-0f9e1caa2642'),
(2, 'Sándwich Envasado', 3.00, 50, 'https://images.unsplash.com/photo-1574755398543-4f6f3b9e3cf3');

-- Postres (Categoría 3)
INSERT INTO products (category_id, nombre, precio, stock, image_url) VALUES
(3, 'Brownie Empacado', 1.80, 60, 'https://images.unsplash.com/photo-1599785209792-19aa706e0a56'),
(3, 'Cupcake de Vainilla', 2.00, 55, 'https://images.unsplash.com/photo-1601976421374-0611f43c0c2c'),
(3, 'Galletas de Chocolate 150g', 1.90, 80, 'https://images.unsplash.com/photo-1589308078050-9720756a68c2'),
(3, 'Pastelito de Fresa Individual', 2.20, 40, 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f'),
(3, 'Gelatina Frutal Empacada', 1.00, 70, 'https://images.unsplash.com/photo-1600455430939-d53a04e8eb31');