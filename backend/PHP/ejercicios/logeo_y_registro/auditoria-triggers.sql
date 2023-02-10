-- Active: 1673864411279@@127.0.0.1@3306@formulariosphp

DROP TABLE IF EXISTS audit;

CREATE TABLE IF NOT EXISTS  audit (
    id_audit INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_name INT,
    old_name VARCHAR(50),
    new_name VARCHAR(50),
    old_email VARCHAR(50),
    new_email VARCHAR(50),
    old_usertype VARCHAR(50),
    new_usertype VARCHAR(50),
    query_type VARCHAR(20) DEFAULT 'AFTER_UPDATE'
);

DELIMITER $$

CREATE TRIGGER IF NOT EXISTS after_registros_update
AFTER UPDATE
ON registros FOR EACH ROW
BEGIN
    -- Sin el delimitador, esta sentencia se ejecutaría al momento
    INSERT INTO audit (id_name, old_name, new_name, old_email, new_email, old_usertype, new_usertype)
    VALUES (old.id, old.name, new.name, old.email, new.email, old.usertype, new.usertype);
END $$


-- Este trigger guarda los datos de las filas borradas
CREATE TRIGGER IF NOT EXISTS before_registros_delete
BEFORE DELETE
ON registros FOR EACH ROW
BEGIN
    INSERT INTO audit (id_name, old_name, old_email, old_usertype, query_type)
    VALUES (old.id, old.name, old.email, old.usertype, 'BEFORE_DELETE');
END $$

-- Una vez hemos terminado de crear los triggers, restauramos el delimitador
DELIMITER ;

-- DROP TRIGGER IF EXISTS after_registros_update;
DROP TRIGGER IF EXISTS before_registros_delete;

SHOW TRIGGERS;

UPDATE registros SET name = 'perrete' WHERE name = 'perrito';
UPDATE registros SET usertype = 'admin' WHERE usertype = 'user';

DELETE FROM registros WHERE id = 2;
