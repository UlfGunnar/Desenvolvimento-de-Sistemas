CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome TEXT NOT NULL,
    login TEXT NOT NULL UNIQUE,
    senha TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome TEXT NOT NUL,
    descricao TEXT,
    preco REAL NOT NULL,
    estoque_minimo INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS estoque (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    produto_id INTEGER NOT NULL,
    tipo_movimentacao TEX   T CHECK(tipo_movimentacao IN ('E', 'S')) NOT NULL,
    quantidade INTEGER NOT NULL,
    data_movimentacao DATE NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produto_id(id)
);

INSERT INTO usuarios (nome, login, senha) VALUES
('Administrador', 'admin', '123456');

INSERT INTO produtos (nome, descricao, preco, estoque_minimo) VALUES
('MARTELO Unha', 'materlo unha com cabo de madeira 25mm', 35.90, 10);

INSERT INTO estoque (produto_id, tipo_movimentacao, quantidade, data_movimentacao) VALUES
(1, 'E', 50, '2023-10-01');