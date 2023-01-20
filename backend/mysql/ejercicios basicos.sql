-- Crear base de datos
DROP SCHEMA IF EXISTS ejercicios;
CREATE DATABASE ejercicios;
-- La msima orden pero evitando errores
CREATE DATABASE IF NOt EXISTS ejercicios; 

-- Seleccionar base de datos 
USE ejercicios;

-- Crear una tabla
drop TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
usuario VARCHAR(15),
 contraseña VARCHAR(25)
 ); 
-- Entre paréntesis van separadas por comas las columnas, cada una seguida del tipo de dato

-- Modificar una tabla
ALTER TABLE usuarios ADD PRIMARY KEY (usuario);
--   Añadir una columna
ALTER TABLE usuarios ADD email VARCHAR(15);
--  modificar una columna
ALTER TABLE usuarios MODIFY email TEXT(15);
-- eliminar una columna
ALTER TABLE usuarios DROP COLUMN email;

-- Insertar una tabla
INSERT INTO usuarios VALUES
 ('Torta16', 'papapa'),
 ('Pancake13', 'tetete');


-- Extraer datos de una tabla
SELECT * FROM usuarios;

-- Elimine la tabla "agenda" si existe:


--  Cree una tabla llamada "agenda", debe tener los siguientes campos: 
  CREATE TABLE agenda (nombre varchar(20),
     domicilio varchar(30),
      telefono varchar(11) 
     );
     
     