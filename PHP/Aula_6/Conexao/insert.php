<?php 
    function inserir($aluno) {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo -> exec('use escola;');

            $sql = "INSERT INTO alunos (nome, media, situacao) VALUES (:nome, :media, :situacao)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $aluno->nome,
                ':media' => $aluno->media,
                ':situacao' => $aluno->situacao
            ]);

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>