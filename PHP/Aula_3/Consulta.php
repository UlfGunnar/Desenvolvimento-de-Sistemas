<?php
    try {
        //DSN diferente de DNS
        $pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //seta o que mudar e depois o que mudar

        $sql = "SELECT nome, email FROM usuario";
        $stmt = $pdo->query($sql);
        //Direção da resposta
        //var_dump($stmt);

        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retorna um array associativo (Uma dicionário de dicionários)

        foreach ($alunos as $chave => $aluno) {
            echo $chave . "- " .  "Nome: " . $aluno['nome'] . " | Email: " . $aluno['email'] . "<br>";
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
}