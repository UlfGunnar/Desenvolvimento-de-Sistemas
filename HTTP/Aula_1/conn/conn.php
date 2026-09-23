<?php 
    function criar_conexao() {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8mb4", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE IF NOT EXISTS cadastro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $pdo -> exec($sql);

            $pdo -> exec("USE cadastro;");

            $pdo -> exec("CREATE TABLE IF NOT EXISTS usuario (
                              id int primary key auto_increment,
                              nome varchar(50) not null,
                              nivel_gay int not null
                        );");

            echo "Banco de dados criado!";
        
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>