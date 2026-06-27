CREATE DATABASE IF NOT EXISTS prueba;
CREATE TABLE IF NOT EXISTS prueba.Usuarios (
    CI INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    contraseña varchar(100) NOT NULL,
    mail varchar(100) NOT NULL,
    a2f boolean,
    PRIMARY KEY (CI)
);
INSERT INTO prueba.Usuarios(Nombre) VALUES ('Cliente1');
INSERT INTO prueba.Usuarios(Nombre) VALUES ('Cliente2');
INSERT INTO prueba.Usuarios(Nombre) VALUES ('Cliente3');
