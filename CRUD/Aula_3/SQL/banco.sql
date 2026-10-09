CREATE DATABASE IF NOT EXISTS Bloco_Notas
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE Bloco_Notas;

CREATE TABLE IF NOT EXISTS Anotacao (
    id_anotacao int AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    anotacao TEXT
);