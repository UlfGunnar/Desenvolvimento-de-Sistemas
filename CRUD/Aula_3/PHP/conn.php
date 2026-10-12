<?php 
    require __DIR__ . '/../vendor/autoload.php';

    function criar_conexao(): PDO {
        /*
        $host = "localhost";
        $porta = 3407;
        $usuario = "root";
        $senha = "root";

        try {
            $pdo = new PDO(
                "mysql:host=$host;port=$porta;charset=utf8mb4",
                $usuario,
                $senha
            );
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (PDOexception $erro) {
            exit("[Falha DSN] Erro ao conectar com o banco de dados: " . $erro->getMessage());
        }
        */

        static $env_carregado = false;

        if (!$env_carregado) {
            $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
            $dotenv -> load();
            $dotenv -> required(['DB_HOST', 'DB_USER', 'DB_PASS']);
            $dotenv -> required(['DB_HOST', 'DB_USER'])->notEmpty();
            $env_carregado = true;
        }

        $host = $_ENV['DB_HOST'];
        $porta = $_ENV['DB_PORT'] ?? 3306;
        $usuario = $_ENV['DB_USER']; 
        $senha = $_ENV['DB_PASS'];

        $DSN = "mysql:host=$host;port=$porta;charset=utf8mb4";

        try {
            return new PDO($DSN, $usuario, $senha, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $erro) {
            exit("[Falha DSN] Erro ao conectar com o banco de dados: " . $erro->getMessage());
        }
    }

    function criar_estrutura($conn) {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS Bloco_Notas
                    CHARACTER SET utf8mb4
                    COLLATE utf8mb4_unicode_ci;";

            $conn -> exec($sql);

            $conn -> exec('USE Bloco_Notas;');

            $sql = "CREATE TABLE IF NOT EXISTS Anotacao (
                        id_anotacao int AUTO_INCREMENT PRIMARY KEY,
                        titulo VARCHAR(100) NOT NULL,
                        anotacao TEXT
                    );";

            $conn -> exec($sql);
        } catch (PDOexception $erro) {
            exit("[Falha Banco de dados] Erro na criação da estrutura do banco: " . $erro->getMessage());
        }
    }

    function usar_banco($conn) {
        $conn -> exec('USE Bloco_Notas');
    }
?>