<?php 
    function calcular($valor, $taxa) {
        $desconto = $valor * ($taxa / 100);

        return $valor - $desconto;
    }

    function saudacao($nome, $titulo = "Sr(a).") {
        return "Olá $titulo $nome";
    }

    function situacao($media) {
        return $media >= 7 ? "Aprovado" : "Reprovado";
    }
?>