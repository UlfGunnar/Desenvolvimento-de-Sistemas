<?php 
    function criar_conexao() {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE IF NOT EXISTS escola CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $pdo -> exec($sql);

            $pdo -> exec("USE escola;");

            $sql = "CREATE TABLE IF NOT EXISTS alunos ( 
                        id INT AUTO_INCREMENT PRIMARY KEY, 
                        nome VARCHAR(100) NOT NULL, 
                        media DECIMAL(4,2) NOT NULL,
                        situacao varchar(15) NOT NULL 
                    );";
            $pdo -> exec($sql);

            echo "Banco de dados criado!";
        
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>