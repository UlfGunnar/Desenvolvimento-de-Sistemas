create database if not exists cadastro;

use cadastro;

create table if not exists usuario (
	id int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null
);

INSERT INTO usuario (nome, email) VALUES
('Maria Silva', 'maria@email.com'),
('João Pereira', 'joao@email.com'),
('Ana Costa', 'ana@email.com'),
('Pedro Santos', 'pedro@email.com'),
('Carla Souza', 'carla@email.com'),
('Lucas Oliveira', 'lucas@email.com'),
('Fernanda Lima', 'fernanda@email.com'),
('Rafael Almeida', 'rafael@email.com'),
('Juliana Rocha', 'juliana@email.com'),
('Bruno Martins', 'bruno@email.com');

select * from usuario;