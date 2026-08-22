<?php
    $frutas = ["maçã", "banana", "laranja"];
    $frutas[] = "uva";

    $pessoa = [
        "nome" => "Diego",
        "idade" => 30,
        "cidade" => "São Paulo"
    ];

    $alunos = [
        ["nome" => "Ana", "nota" => 9.5],
        ["nome" => "João", "nota" => 7.5]
    ];

    function saudacao($nome, $titulo = "Sr.") {
        return "Olá, $titulo $nome!<br>";
    }

    echo saudacao("Diego");
    echo saudacao("Ana", "Dra.");
    echo $frutas[0];
    echo count($frutas) . "<br>";

    array_push($frutas, "manga");
    array_pop($frutas);
    array_shift($frutas);
    sort($frutas);

    echo $pessoa["nome"];
    $pessoa ["email"] = "diego@email.com";

    ForEach ($pessoa as $chave => $valor) {
        echo " $chave: $valor\n";
    } 

    echo "<br>";

    ForEach($alunos as $aluno) {
        echo $aluno["nome"] . ": " . $aluno["nota"] . "\n";
    }

    array_keys($pessoa);
    array_values($pessoa);
    isset($pessoa["nome"]);
    unset($pessoa["idade"]);

    echo "<img src='image.png'>";
?>