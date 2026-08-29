<?php 
    $alunos = [
        ["nome" => "Ana", "nota1" => 8.0, "nota2" => 9.0, "frequencia" => 90],
        ["nome" => "Carlos", "nota1" => 5.0, "nota2" => 6.0, "frequencia" => 80],
        ["nome" => "Mariana", "nota1" => 9.5, "nota2" => 8.5, "frequencia" => 70]
    ];

    function calcularMedia($alunos) {
        $c = 0;

        foreach ($alunos as $aluno) {     
            $media = ($aluno["nota1"] + $aluno["nota2"]) / 2;
            $alunos[$c]["media"] = $media;

            if ($media >= 7 && $aluno["frequencia"] >= 75) {
                $alunos[$c]["Situacao"] = "Aprovado";
            }
            elseif ($media >= 5 && $aluno["frequencia"] >= 75) {
                $alunos[$c]["Situacao"] = "Recuperação";
            }
            else {
                $alunos[$c]["Situacao"] = "Reprovado";
            }

            $c++;
        };

        return $alunos;
    };

    $alunos_editado = calcularMedia($alunos);
    
    foreach ($alunos_editado as $aluno) {
        echo "Nome: "        . $aluno["nome"] . 
             " - Média: "    . $aluno["media"] . 
             " - Frequência: " . $aluno["frequencia"] .
             " - Situação: "   . $aluno["Situacao"] . "<br>";
    }
?>