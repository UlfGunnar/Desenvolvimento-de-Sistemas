<?php
    function criar_conexao() {
        $host = "localhost";
        $porta = 3407;
        $usuario = "root";
        $senha = "root";

        $pdo = new PDO (
            "mysql:host=$host;port=$porta;charset-utf8mb4",
            $usuario,
            $senha
        );

        $pdo -> setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    function criar_estrutura($conn) {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS escola_formulario
                    CHARACTER SET utf8mb4
                    COLLATE utf8mb4_unicode_ci;";

            $conn -> exec($sql);

            $conn -> exec("USE escola_formulario;");

            $conn -> exec("CREATE TABLE IF NOT EXISTS alunos (
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
                            );");

            $conn -> exec ("CREATE TABLE IF NOT EXISTS universidade (
                                CNPJ VARCHAR(14) PRIMARY KEY,
                                nome VARCHAR(100) NOT NULL,
                                telefone VARCHAR(11) NOT NULL,
                                rua VARCHAR(255) NOT NULL,
                                bairro VARCHAR(100) NOT NULL,
                                numero VARCHAR(4) NOT NULL
                            ); ");
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
?>