CREATE TABLE usuarios (
    id         INT          NOT NULL AUTO_INCREMENT,
    usuario    VARCHAR(50)  NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,

    PRIMARY KEY (id)
);