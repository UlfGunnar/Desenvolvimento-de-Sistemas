<?php 
    $notas = [8.5, 6.0, 4.5, 9.0, 7.0];

    function verificarSituacao($notas) {
        $c = 1;
        $quant_status = [
            "Aprovado"    => 0,
            "Recuperacao" => 0,
            "Reprovado"   => 0,
        ];

        foreach ($notas as $nota) {
            echo "Aluno $c - Nota: $nota - ";

            if ($nota >= 7) {
                echo "Aprovado <br>";

                $quant_status["Aprovado"]++;
            }
            elseif (7 < $nota || $nota >=5) {
                echo "Recuperação <br>";

                $quant_status["Recuperacao"]++;
            }
            else {
                echo "Reprovado <br>";

                $quant_status["Reprovado"]++;
            }

            $c++;   
        }

        echo "<br>";
        echo "Resumo: <br>";
        foreach ($quant_status as $chave => $valor) {
            echo "$chave: $valor <br>";
        }
    }

    verificarSituacao($notas)
?>