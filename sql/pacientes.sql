CREATE DATABASE datosmedicos;

CREATE TABLE pacientemedico (
    id          INT          NOT NULL AUTO_INCREMENT,
    nombre      VARCHAR(100) NOT NULL,
    cedula      INT          NOT NULL UNIQUE,
    descripcion TEXT,
    medicamento VARCHAR(255),
    resuelto    BOOLEAN      NOT NULL DEFAULT FALSE,

    PRIMARY KEY (id)
);