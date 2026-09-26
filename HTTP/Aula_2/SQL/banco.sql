CREATE DATABASE IF NOT EXISTS escola_formulario
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE escola_formulario;

CREATE TABLE IF NOT EXISTS alunos (
    CPF VARCHAR(11) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    curso VARCHAR(100) NOT NULL,
    turma VARCHAR(10) NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    rua VARCHAR(50) NOT NULL,
    bairro VARCHAR(20) NOT NULL,
    numero int NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
