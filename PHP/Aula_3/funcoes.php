<?php 
    function calcular($valor, $taxa) {
        $desconto = $valor * ($taxa / 100);

        return $valor - $desconto;
    }

    function saudacao($nome, $titulo = "Sr(a).") {
        return "Olá $titulo $nome";
    }
?>