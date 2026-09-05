<?php 
    function criar_conexao() {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8mb4", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE IF NOT EXISTS blibioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $pdo -> exec($sql);

            $pdo -> exec("USE blibioteca;");

            $comandos = [
                "CREATE TABLE IF NOT EXISTS categorias (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(100) NOT NULL UNIQUE
                )",
                "CREATE TABLE IF NOT EXISTS leitores (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    ativo VARCHAR(10) NOT NULL DEFAULT 'Ativo',
                    criado_em TIMESTAMP NOT NULL DEFAULT now()
                )",
                "CREATE TABLE IF NOT EXISTS livros (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    categoria_id INT NOT NULL,
                    titulo VARCHAR(100) NOT NULL,
                    autor VARCHAR(100) NOT NULL,
                    isbn VARCHAR(13) NOT NULL UNIQUE,
                    ano_publicacao DATE NOT NULL,
                    disponivel VARCHAR(15) NOT NULL DEFAULT 'disponivel',
                    CONSTRAINT fk_categoria_id
                        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
                        ON UPDATE CASCADE ON DELETE CASCADE,
                    CONSTRAINT chk_livro_ano
                        CHECK (YEAR(ano_publicacao) BETWEEN 1900 AND 2100)
                )",
                "CREATE TABLE IF NOT EXISTS emprestimos (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    leitor_id INT NOT NULL,
                    livro_id INT NOT NULL,
                    data_emprestimo DATE NOT NULL,
                    data_prevista DATE NOT NULL,
                    data_devolucao DATE NULL,
                    status VARCHAR(20) NOT NULL DEFAULT 'Emprestado',
                    CONSTRAINT fk_leitor_id
                        FOREIGN KEY (leitor_id) REFERENCES leitores(id)
                        ON UPDATE CASCADE ON DELETE CASCADE,
                    CONSTRAINT fk_livro_id
                        FOREIGN KEY (livro_id) REFERENCES livros(id)
                        ON UPDATE CASCADE ON DELETE CASCADE,
                    CONSTRAINT chk_ativo
                        CHECK (status IN ('Emprestado', 'Devolvido'))
                )"
                ///"CREATE INDEX idx_emprestimo_data_emprestimo ON emprestimos (data_emprestimo)",
                ///"CREATE INDEX idx_livros_isbn ON livros (isbn)"
            ];
            
            foreach ($comandos as $comando) {
                $pdo->exec($comando);
            }

            echo "Banco de dados criado!";
        
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>