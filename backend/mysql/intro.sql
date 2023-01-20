-- Esto es un comentario (ctrl + /)

-- Seleccionar o extraer datos de una tabla
SELECT * FROM world.country;

-- Actualizar o modificar datos existente de una tabla 
UPDATE academia.alumnos SET poblacion = 'Barakaldo' WHERE dni = '12345678F';
-- Es importante recordar ingresar un WHERE al usar UPDATE. Ya que sin este, se actualizarán TODOS los datos de la tabla

-- Borrar dato sde una tabla 
DELETE FROM nombre_de_tabla WHERe condicion;
-- Sin el WHERE , se borrarán todos los datos de la tabla!

-- Añadir datos a una tabla 
INSERT INTO academia.alumnos (dni, nombre, apellido, apellido2, tlf)
VALUES ('78945612A', 'Victoria', 'Pérez', 'García', 645781212);
-- Una query puede contener tantas lineas como sean necesarias, pero al final siempre deben llevar ;
-- Si se van agregar valores para todas las columnas de una tabla, no es necesario indicar las columnas; 
INSERT INTO academia.alumnos
VALUES ('45678923B', 'Armando',  'Casas', 'Rodriguez', 963852741, 'Portugalete', 42521);

-- SELECT DISTINCT
-- se muestra cuando queremos mostrar datos NO DUPLICADOS de una tabla
SELECT language, continent FROM world.country c
JOIN world.countrylanguage l ON c.Code = l.CountryCode
WHERE continent NOT IN ('south america', 'asia')
ORDER BY Continent, language DESC;

-- MIN() Y MAX()
-- Funciones que recogen el minimo y máximo valor de una columna, respectivamente
SELECT MIN(population) FROM world.city;
SELECT MAX(population) FROM world.city;

-- COUNT(), AVG(), SUM()
-- COUNT(), retorna el número de registros que coinciden con la query
SELECT COUNT(*) FROM world.city
WHERE population > 1500000;

-- AVG() retorna el promedio de los valores en una columna
SELECT AVG(city.population) 'media de habitantes de las ciudades de España, de la base de datos' FROM world.city
JOIN world.country ON country.code = city.countrycode
WHERE country.name = 'sapin';

-- IN Y NOT IN
-- Se usa para indicar varias opciones para una columna en una clausula WHERE
SELECT language, name FROM  world.country c
JOIN world.countrylanguage l ON c.code = l.countrycode
WHERE name IN ('germany', 'france', 'belgium');

 -- BETWEEN
 -- Se usa para buscar resultados que estén contenidos entre dos valores 
 SELECT name, population FROM world.city
 WHERE Population not BETWEEN 250000 AND 500000;
--  OR Population BETWEEN 750000 and 850000;  

-- ALIAS
SELECT CONCAT(nombre, ' ' , apellido1) AS 'Nombre Completo' FROM academia.alumnos;
-- GROUP BY
-- Sirve par aacumular columnas calculadas AVG(), COUNT(), SUM(), MIN(), MAX() 
SELECT COUNT(city.name) FROM world.city
JOIN world.country ON city.countrycode = country.code
WHERE continent = 'africa'
GROUP BY country.name;

-- HAVING
-- Es el condicionalpara el GROUP BY y que la clausula WHERE no se puede usar después de esta
SELECT COUNT(city.name) 'Numero de ciudades', country.name 'Pais' FROM world.city
JOIN world.country ON city.countrycode = country.code
WHERE continent = 'africa'
GROUP BY country.name  
-- Si queremos añadir una condición a qué grupos queremos visualizar, usamos el HAVING
HAVING count(city.name) > -5;
-- Solo mostrar aquellos paises con 5 ciudades o más 

-- EXISTS
-- Se usa con el WHERE y una subquery cuyo resultado retorna en TRUE or FALSE  dependiendo de si se cumple o no 
-- Sirve para filtrar datos con condiciones más avanzadas.
SELECT name, CountryCode FROM world.city
WHERE EXISTS (SELECT name FROM world.country WHERE city.CountryCode = country.code AND lifeExpectancy >= 75 AND Continent = 'asia')
 ORDER BY countrycode;
 
 -- ANY, ALL
 
 SELECT name FROM world.country
 WHERE CODE = ANY (
 SELECT countrycode FROM city
 WHERE Population > 2000000);
-- AVG si alguna cumple la condición, retorna true

SELECT name FROM world.country
WHERE code = ALL (
SELECT countrycode FROM city
WHERE Population > 2000000);
-- ALL retorna false si no TODOS los resultados se cumplen

-- INSERT SELECT
-- Es un INSERT con una subquery, copia los resultados de esta y los introduce en la tabla que le indicamos 

-- Creamos una tabla de ejemplo
CREATE TABLE ejercicios.ciudades ( 
id INT PRIMARY KEY,
nombre VARCHAR(50),
Pais VARCHAR(50),
Continente VARCHAR(50));

-- Insertamos en la tabla las ciudades con su respectivo pais y continente
INSERT INTO ejercicios.ciudades
SELECT c.id, c.name, p.name, p.continent FROM world.city c
JOIN world.country p ON c.CountryCode = p.Code
WHERE Continent IN ('south america', 'asia', 'oceania');
 
 SELECT * FROM ejercicios.ciudades ORDER BY Pais;
 
 -- CASE
 -- Es el if/else de MYSQL, retorna un dato que podemos mostrar en una columna
 SELECT name, lifeExpectancy,
 CASE
 WHEN lifeExpectancy < 50 THEN 'Lo tienen jodido'
 WHEN lifeExpectancy BETWEEN 50 AND 70 THEN 'Es aceptable'
 WHEN lifeExpectancy > 70 THEN 'Viven muy bien'
 END AS 'Calidad de vida'
 FROM world.country;
 
 -- IFNULL(), COALESCE()
 -- Sirven para manejar resultados cuando nos encontramos con un null
 SELECT concat(nombre, ' ', apellido1, ' ', IFNULL(apellido2, ' ')
 
