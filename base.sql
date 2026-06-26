Base de datos:
CREATE DATABASE IF NOT EXISTS prueba;
CREATE TABLE IF NOT EXISTS prueba.Clientes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO prueba.Clientes(nombre) VALUES ('Cliente1');
INSERT INTO prueba.Clientes(nombre) VALUES ('Cliente2');
INSERT INTO prueba.Clientes(nombre) VALUES ('Cliente3');
