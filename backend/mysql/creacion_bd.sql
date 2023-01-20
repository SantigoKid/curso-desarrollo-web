-- Crear una bd llamda 'tienda' y comenzar a usarla
CREATE DATABASE tienda;
USE tienda;
-- crear una tabla 'productos'
-- clave priamria: codigo con tres caracteres
--- nombre
-- precio con dos decimales
-- fechaalta tipo de fecha

CREATE TABLE productos (
    codigo VARCHAR(3) PRIMARY KEY,
    nombre VARCHAR(45),
    precio INT,
    fecha_alta DATE
);

-- Corregimos /añadimos restricciones a la tabla:
ALTER TABLE productos
-- MODIFY COLUMN fecha_alta fechaalta DATE;
MODIFY COLUMN fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
MODIFY COLUMN precio DECIMAL(6,2),
ADD CONSTRAINT pk_productos PRIMARY KEY (codigo);

-- Insertar datos en la tabla
INSERT INTO productos (codigo, nombre, precio) VALUES ('a01', 'afilador', 2.50);
INSERT INTO productos (codigo, nombre, precio) VALUES ('s01', 'silla mod. ZAZ', 20);
INSERT INTO productos (codigo, nombre, precio) VALUES ('s02', 'silla mod. XAX', 25);

-- Comprobamos que los datos se han introducido correctamente
SELECT * FROM productos;

-- Añadir una nueva columna con la categoría de los productos
ALTER TABLE productos ADD COLUMN categoría VARCHAR(15);

-- Ahora mismo todas las categorias tienen valor NULL vamos a corregir esto añadiendo un valor a todos los productos
UPDATE productos SET categoría = 'herramienta' WHERE categoria is NULL;

-- Modificamos las categorias de las sillas a un término correcto
UPDATE productos SET categoría = 'silla' WHERE codigo LIKE 's__';

UPDATE productos SET categoría = 'silla' WHERE nombre LEFT(nombre, 5) = 'Silla';

-- Ejercicios de repaso:
-- Datos del producto 'Afilador'
SELECT * FROM productos WHERE nombre = 'afilador';
-- Productos cuyo nombre empieza por S
SELECT * FROM productos WHERE nombre LIKE 'S%';
-- nombre y precio de los productos con un valor superior a 22
SELECT nombre, precio FROM productos WHERE precio > 22;
--  precio medio de las sillas
SELECT AVG(precio) FROM productos WHERE categoría = 'silla';
-- SELECT AVG(precio) FROM productos WHERE categoria = 'silla%';
-- SELECT AVG(precio) FROM productos WHERE categoria = 's%';
-- lista de categorias sin duplicados
SELECT DISTINCT(categoría) FROM productos;
-- cantidad de productos por categoría

SELECT COUNT(*), categoria FROM productos
GROUP BY categoría;
-- Productos cuyo valor es inferior a la media del precio de las sillas
SELECT nombre, precio FROM productos  WHERE precio < (SLEECT AVG(precio) FROM productos WHERE categoría = 'silla');

