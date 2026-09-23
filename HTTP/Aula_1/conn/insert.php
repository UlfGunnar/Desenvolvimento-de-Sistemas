<?php 
    function inserir($pessoa) {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo -> exec('use cadastro;');

            $sql = "INSERT INTO usuario (nome, nivel_gay) VALUES (:nome, :nivel_gay)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $pessoa->nome,
                ':nivel_gay' => $pessoa->nivel_gay
            ]);

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>