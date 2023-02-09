DROP TABLE IF EXISTS audit;

-- Creamos una tabla para auditar los cambios en los datos de la tabla 'usuarios'
CREATE TABLE IF NOT EXISTS audit(  
    id_audit INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_user INT,
    old_user VARCHAR(50),
    new_user VARCHAR(50),
    old_email VARCHAR(50),
    new_email VARCHAR(50),
    old_usertype VARCHAR(50),
    new_usertype VARCHAR(50),
    query_type VARCHAR(20) DEFAULT 'AFTER_UPDATE'
);


-- El delimitador es el caracter que completa una sentencia (por defecto el ';')
DELIMITER $$
-- Cambiamos el delimitador con el fin de que el trigger se ejecute como un solo bloque

-- Creamos un trigger que almacenará los datos viejos cuando hay una modificación
CREATE TRIGGER IF NOT EXISTS after_regsitros_update
AFTER UPDATE
ON registros FOR EACH ROW
BEGIN
    -- Sin el delimitador, esta sentencia se ejecutaría al momento
    INSERT INTO audit (id_user, old_user, new_user, old_email, new_email, old_usertype, new_usertype)
    VALUES (old.id, old.user, new.user, old.email, new.email, old.user_type, new.user_type);
END $$


-- Este trigger guarda los datos de las filas borradas
CREATE TRIGGER IF NOT EXISTS before_usuarios_delete
BEFORE DELETE
ON registros FOR EACH ROW
BEGIN
    INSERT INTO audit (id_user, old_user, old_email, old_usertype, query_type)
    VALUES (old.id, old.user, old.email, old.user_type, 'BEFORE_DELETE');
END $$

-- Una vez hemos terminado de crear los triggers, restauramos el delimitador
DELIMITER ;

DROP TRIGGER IF EXISTS after_registros_update;
DROP TRIGGER IF EXISTS before_registros_delete;

SHOW TRIGGERS;

UPDATE registros SET user = 'Pepita' WHERE user = 'Pepa';
UPDATE registros SET user = 'Jonathan' WHERE user = 'jon';

DELETE FROM registros WHERE id = 2;