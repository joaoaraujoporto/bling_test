CREATE DATABASE IF NOT EXISTS cine_db;
USE cine_db;

CREATE TABLE IF NOT EXISTS ator  (
    id INT AUTO_INCREMENT,
    nome VARCHAR(45),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS filme (
    id INT AUTO_INCREMENT,
    titulo VARCHAR(45),
    ano YEAR(4),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS participa (
    id INT AUTO_INCREMENT,
    idAtor INT,
    idFilme INT,
    PRIMARY KEY (id),
    CONSTRAINT participa_ator_fk FOREIGN KEY (idAtor) REFERENCES ator (id),
    CONSTRAINT participa_filme_fk FOREIGN KEY (idFilme) REFERENCES filme (id)
);

CREATE TABLE IF NOT EXISTS diretor (
    id INT AUTO_INCREMENT,
    nome VARCHAR(45),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS dirige (
    id INT AUTO_INCREMENT,
    idDiretor INT,
    idFilme INT,
    PRIMARY KEY (id),
    CONSTRAINT dirige_diretor_fk FOREIGN KEY (idDiretor) REFERENCES diretor (id),
    CONSTRAINT dirige_filme_fk FOREIGN KEY (idFilme) REFERENCES filme (id)
);