<?php 
    $Teclado = [
        "nome"       => "Teclado",
        "preco"      => 120.00,
        "quantidade" => 2,
        "desconto"   => 10
    ];
    const NOME_LOJA = "Tech Store";

    function calculo($Teclado) {
        $Valores = [
            "Valor_bruto"    => $Teclado["preco"] * $Teclado["quantidade"],
            "Valor_desconto" => $Teclado["preco"] * $Teclado["quantidade"] * $Teclado["desconto"] / 100,
            "Valor_final"     =>  $Teclado["preco"] * $Teclado["quantidade"] - ($Teclado["preco"] * $Teclado["quantidade"] * $Teclado["desconto"] / 100)
        ];

        return $Valores;
    }

    $Valores_editado = calculo($Teclado);

    echo "Loja: " . NOME_LOJA . "<br>";
    echo "Produto: " . $Teclado["nome"] . "<br>";
    echo "Quantidade: "  . $Teclado["quantidade"] . "<br>";
    echo "Valor bruto: R$" . $Valores_editado["Valor_bruto"] . "<br>";
    echo "Desconto: R$" . $Valores_editado["Valor_desconto"] . "<br>";
    echo "Valor final: R$" . $Valores_editado["Valor_final"] . "<br>";
?>