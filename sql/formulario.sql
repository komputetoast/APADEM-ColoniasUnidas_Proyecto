CREATE DATABASE donaciones;

CREATE TABLE donaciones (
    id          INT             NOT NULL AUTO_INCREMENT,
    nombre      VARCHAR(100)    NOT NULL,
    cedula      VARCHAR(20)     NOT NULL UNIQUE,
    correo      VARCHAR(150)    NOT NULL,
    monto       DECIMAL(10, 2)  NOT NULL DEFAULT 0.00,
    descripcion TEXT,

    PRIMARY KEY (id)
);