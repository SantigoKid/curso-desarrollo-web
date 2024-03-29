CREATE DATABASE bdej3;

USE bdej3;


CREATE TABLE EMPLEADOS (
    DNI INT(8),
    NOMBRE VARCHAR(10) NOT NULL,
    APELLIDO1 VARCHAR(15) NOT NULL,
    APELLIDO2 VARCHAR(15),
    DIRECC1 VARCHAR(25),
    DIRECC2 VARCHAR(20),
    CIUDAD VARCHAR(20),
    PROVINCIA VARCHAR(20),
    COD_POSTAL VARCHAR(5),
    SEXO VARCHAR(1),
    FECHA_NAC DATE
);

CREATE TABLE HISTORIAL_LABORAL (
    EMPLEADO_DNI INT(8),
    TRABAJO_COD INT(5),
    FECHA_INICIO DATE, 
    FECHA_FIN DATE, 
    DPTO_COD INT(5),
    SUPERVISOR_DNI INT(8)
);

CREATE TABLE HISTORIAL_SALARIAL (
EMPLEADO_DNI INT(8),
SALARIO INT NOT NULL,
FECHA_COMIENZO DATE,
FECHA_FIN DATE
);

CREATE TABLE DEPARTAMENTOS (
DPTO_COD INT(5),
NOMBRE_DPTO VARCHAR(30),
DPTO_PADRE INT(5), 
PRESUPUESTO INT NOT NULL, 
PRES_ACTUAL INT
);

CREATE TABLE ESTUDIOS (
    EMPLEADO_DNI INT(8),
    UNIVERSIDAD INT(5),
    AÑO INT,
    GRADO VARCHAR(3),
    ESPECIALIDAD VARCHAR(20)
);

CREATE TABLE UNIVERSIDADES (
    UNIV_COD INT(5),
    NOMBRE_UNIV VARCHAR(25),
    CIUDAD VARCHAR(20),
    MUNICIPIO VARCHAR(2),
    COD_POSTAL VARCHAR(5)
);

CREATE TABLE TRABAJOS (
    TRABAJO_COD INT(5),
    NOMBRE_TRAB VARCHAR(20),
    SALARIO_MIN INT(2) NOT NULL,
    SALARIO_MAX INT(2) NOT NULL
);

ALTER TABLE EMPLEADOS
ADD CONSTRAINT CK_SEXO
CHECK ( SEXO = 'H' OR SEXO = 'M');

ALTER TABLE EMPLEADOS
ADD CONSTRAINT UK_NOMBRE_DPTO
UNIQUE (NOMBRE_DPTO);

ALTER TABLE TRABAJOS
ADD CONSTRAINT UK_NOMBRE_TRAB
UNIQUE (NOMBRE_TRAB);

ALTER TABLE EMPLEADOS ADD CONSTRAINT PK_EMPLEADOS
PRIMARY KEY (DNI);

ALTER TABLE HISTORIAL_LABORAL ADD CONSTRAINT PK_HISTORIAL_LABORAL
PRIMARY KEY (EMPLEADO_DNI,TRABAJO_COD, FECHA_INICIO );

ALTER TABLE HISTORIAL_SALARIAL ADD CONSTRAINT PK_HISTORIAL_SALARIAL
PRIMARY KEY (EMPLEADO_DNI, SALARIO, FECHA_COMIENZO);

ALTER TABLE DEPARTAMENTOS ADD CONSTRAINT PK_DEPARTAMENTOS
PRIMARY KEY (DPTO_COD);

ALTER TABLE ESTUDIOS ADD CONSTRAINT PK_ESTUDIOS
PRIMARY KEY (EMPLEADO_DNI, UNIVERSIDAD, ESPECIALIDAD);

ALTER TABLE UNIVERSIDADES ADD CONSTRAINT PK_UNIVERSIDADES
PRIMARY KEY (UNIV_COD);

ALTER TABLE TRABAJOS ADD CONSTRAINT PK_TRABAJOS
PRIMARY KEY(TRABAJO_COD);


ALTER TABLE HISTORIAL_LABORAL
ADD CONSTRAINT HISTORIAL_LABORAL_EMPLEADO
FOREIGN KEY (EMPLEADO_DNI) REFERENCES EMPLEADOS (DNI);

ALTER TABLE HISTORIAL_SALARIAL
ADD CONSTRAINT HISTORIAL_SALARIAL_EMPLEADO
FOREIGN KEY (EMPLEADO_DNI) REFERENCES EMPLEADOS (DNI);

ALTER TABLE HISTORIAL_LABORAL
ADD CONSTRAINT FK_HISTORIAL_LABORAL_SUPERVISOR
FOREIGN KEY (SUPERVISOR_DNI) REFERENCES EMPLEADOS (DNI);
ALTER TABLE HISTORIAL_LABORAL
ADD CONSTRAINT FK_HISTORIAL_LABORAL_TRABAJO
FOREIGN KEY (TRABAJO_COD)
REFERENCES TRABAJOS (TRABAJO_COD);

ALTER TABLE HISTORIAL_LABORAL
ADD CONSTRAINT FK_HISTORIAL_LABORAL_DPTO
FOREIGN KEY (DPTO_COD) REFERENCES DEPARTAMENTOS (DPTO_COD);

ALTER TABLE DEPARTAMENTOS ADD CONSTRAINT FK_DEPARTAMENTO_PADRE
FOREIGN KEY (DPTO_PADRE) REFERENCES DEPARTAMENTOS (DPTO_COD);

ALTER TABLE ESTUDIOS ADD CONSTRAINT FK_ESTUDIOS_EMPLEADO
FOREIGN KEY (EMPLEADO_DNI)
REFERENCES EMPLEADOS (DNI);

ALTER TABLE ESTUDIOS
ADD CONSTRAINT FK_ESTUDIOS_UNIVERSIDAD
FOREIGN KEY(UNIVERSIDAD) REFERENCES UNIVERSIDADES (UNIV_COD);

INSERT INTO EMPLEADOS (
    NOMBRE, APELLIDO1, APELLIDO2, DNI, SEXO
)
VALUES ('Sergio', 'Palma', 'Sergio', 'Entrena', '111222', 'P' );

INSERT INTO EMPLEADOS (
    NOMBRE, APELLIDO1, APELLIDO2, DNI, SEXO
    )
VALUES (
    'Lucia', 'Ortega', 'Plus', '222333', NULL
);

INSERT INTO HISTORIAL_LABORAL (
    EMPLEADO_DNI, TRABAJO_COD, FECHA_INICIO, FECHA_FIN, DPTO_COD, SUPERVISOR_DNI 
)

VALUES (

);

INSERT INTO HISTORIAL_LABORAL (
    EMPLEADO_DNI, TRABAJO_COD, FECHA_INICIO, FECHA_FIN, DPTO_COD, SUPERVISOR_DNI 
)

VALUES (
'111222', NULL, '6-JUN-1996', NULL, NULL, '222333'
);

INSERT INTO HISTORIAL_SALARIAL (
    EMPLEADO_DNI, SALARIO, FECHA_COMIENZO, FECHA_FIN
)

VALUES (

);

INSERT INTO DEPARTAMENTOS (
    DPTO_COD, NOMBRE_DPTO, DPTO_PADRE, PRESUPUESTO, PRES ACTUAL
)

VALUES(

);

INSERT INTO ESTUDIOS (
    EMPLEADO_DNI, UNIVERSIDAD, AÑO, GRADO, ESPECIALIDAD
)

VALUES (

);

INSERT INTO TRABAJOS (
    TRABAJO_COD, NOMBRE_TRAB, SALARIO_MIN, SALARIO_MAX 
)

VALUES (

);
ALTER TABLE ESTUDIOS DROP CONSTRAINT FK_ESTUDIOS_UNIVERSIDADES;

ALTER TABLE ESTUDIOS
ADD CONSTRAINT FK_ESTUDIOS_UNIVERSIDAD
FOREIGN KEY (UNIVERSIDAD)
REFERENCES UNIVERSIDADES (UNIV_COD)
ON DELETE SET NULL;

CREATE OR REPLACE TRIGGER COD_POSTAL_CHECK
BEFORE INSERT OR UPDATE
OF CIUDAD, COD_POSTAL
ON EMPLEADOS
FOR EACH ROW
WHEN (:NEW.CIUDAD IS NOT NULL)
BEGIN
IF (:NEW.COD_POSTAL IS NULL)
THEN RAISE_APLICATION

