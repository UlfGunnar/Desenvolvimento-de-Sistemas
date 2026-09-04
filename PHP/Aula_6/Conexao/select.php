<?php 
    function select() {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3407;charset=utf8", "root", "root");

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo -> exec('USE escola;');

            $sql = "SELECT nome, media, situacao FROM alunos";
            $stmt = $pdo->query($sql);

            $alunos_select = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $alunos_select;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        };
    }
?>