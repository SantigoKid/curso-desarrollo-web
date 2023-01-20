CREATE DATABASE bdej2;

USE bdej2;

CREATE TABLE espectaculo (
    cod_espectaculo varchar(10),
    nombre VARCHAR(60),
    tipo VARCHAR(60),
    fecha_inicial DATE,
    fecha_final DATE,
    interprete VARCHAR(60),
    cod_recinto INTEGER
);

CREATE TABLE precios_espectaculos (
    cod_espectaculo VARCHAR(10),
    cod_recinto INTEGER,
    zona VARCHAR(60),
    precio DECIMAL
);

CREATE TABLE recintos (
    cod_recinto INTEGER,
    nombre VARCHAR(60),
    direccion VARCHAR(60),
    ciudad VARCHAR(60),
    telefono INT,
    horario VARCHAR(60)
);

CREATE TABLE zonas_recintos (
    cod_recinto INT,
    zona VARCHAR(60),
    capcidad INT
);

CREATE TABLE asientos (
    cod_recinto INT,
    zona VARCHAR(60), 
    fila VARCHAR(10),
    numero INT
);

CREATE TABLE representaciones (
    cod_espectaculo VARCHAR(10),
    fecha DATE,
    hora VARCHAR(60)
);

CREATE TABLE entradas (
cod_espectaculo VARCHAR(10),
fecha DATE,
hora VARCHAR(60),
cod_recinto INT,
fila VARCHAR(10),
numero INT,
zona VARCHAR(60),
dni_cliente VARCHAR(8)
);

CREATE TABLE espectadores (
    dni_cliente VARCHAR(8),
    nombre VARCHAR(60),
    direccion VARCHAR(60),
    telefeno INT,
    ciudad VARCHAR(60),
    ntarjeta VARCHAR(60)
);

ALTER TABLE espectaculo ADD CONSTRAINT pk_espectaculos
PRIMARY KEY (cod_espectaculo),
ADD CONSTRAINT fk_espectaculos_recintos
FOREIGN KEY (cod_recinto) REFERENCES recintos(cod_recinto);


ALTER TABLE precios_espectaculos ADD CONSTRAINT pk_precios_espectaculos
PRIMARY KEY (cod_espectaculo,cod_recinto, zona, precio),
ADD CONSTRAINT fk_precios_espectaculos
FOREIGN KEY (cod_espectaculos) REFERENCES espectaculo (cod_espectaculos),
ADD CONSTRAINT fk_precios_recinto
FOREIGN KEY (cod_recinto) REFERENCES recintos(cod_recinto),
ADD CONSTRAINT fk_precios_zonas
FOREIGN KEY (zona) REFERENCES zonas_recintos(zona);


ALTER TABLE recintos ADD CONSTRAINT pk_recintos
PRIMARY KEY (cod_recinto);

ALTER TABLE zonas_recintos ADD COSNTRAINT pk_zonas_recintos
PRIMARY KEY (cod_recinto, zona),
ADD CONSTRAINT fk_zonas_recintos
FOREIGN KEY (cod_recintos) REFERENCES recintos(cod_recintos);

ALTER TABLE asientos ADD CONSTRAINT pk_asientos
PRIMARY KEY (cod_recinto, zona, fila, numero),
ADD CONSTRAINT fk_asientos_recintos
FOREIGN KEY (cod_recinto) recintos(cod_recintos),
ADD CONSTRAINT fk_asientos_zonas
FOREIGN KEY (zona) REFERENCES zonas_recintos(zona); 

ALTER TABLE representaciones ADD CONSTRAINT pk_representaciones
PRIMARY KEY (cod_espectaculo, fecha, hora);
ADD CONSTRAINT fk_representaciones_espectaculo
FOREIGN KEY (cod_espectaculo) REFERENCES espectaculo(cod_espectaculo);

ALTER TABLE entradas ADD CONSTRAINT pk_entradas
PRIMARY KEY (cod_espectaculo, fecha, hora, zona, fila, numero, dni_cliente),
ADD CONSTRAINT fk_entradas_espectadores
Foreign Key (dni_cliente) REFERENCES espectadores(dni_cliente),
ADD CONSTRAINT fk_entradas_espectaculo
FOREIGN KEY (cod_espectaculo) REFERENCES espectaculos (cod_espectaculo),
ADD CONSTRAINT fk_entradas_asientos
FOREIGN KEY (cod_recinto, zona, fila, numero) REFERENCES asientos(cod_recinto, zona, fila, numero);

ALTER TABLE espectadores ADD CONSTRAINT pk_espectadores
PRIMARY KEY (dni_cliente);

