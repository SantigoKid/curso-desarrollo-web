-- 1. Actores que tienen de primer nombre ‘Scarlett’.
SELECT * 
FROM actor 
WHERE upper(first_name) = 'SCARLETT';
-- 2. Actores que tienen de apellido ‘Johansson’.
SELECT *
FROM ACTOR
WHERE upper(last_name) = 'JOHANSSON';
-- 3. Actores que contengan una ‘O’ en su nombre.
SELECT *
FROM actor
WHERE upper(first_name) like '%O%';
-- 4. Actores que contengan una ‘O’ en su nombre y en una ‘A’ en su apellido.
SELECT *
FROM actor
WHERE upper(first_name) like '%O%'
AND upper(last_name) like '%A%';
-- 5. Actores que contengan dos ‘O’ en su nombre y en una ‘A’ en su apellido.
SELECT * 
FROM actor 
WHERE upper(first_name) LIKE '%O%O%'
AND upper(last_name) LIKE '%A%';
-- 6. Actores donde su tercera letra sea ‘B’.
SELECT * 
FROM actor 
WHERE upper(first_name) LIKE '__B%';
-- 7. Ciudades que empiezan por ‘a’
SELECT *
FROM city
WHERE upper(city) LIKE 'A%';
-- 8. Ciudades que acaban por ‘s’.
SELECT * 
FROM city 
WHERE upper(city) LIKE '%S';
-- 9. Ciudades del country 61.
SELECT *
FROM city
WHERE country_id = 61;
-- 10. Ciudades del country ‘Spain’.
