<?php 
    require_once "funcoes.php";

    $texto = "25";
    $idade = (int) $texto;

    $precoTexto = "19.90";
    $preco = (float) $precoTexto;

    $ativo = true;
    $apelido = null;
    $nomeExibicao = $apelido ?? "Visitante";
    $nome = " Ulf ";
    $nome_editado =  trim($nome);
    $taxa = 10;
    date_default_timezone_set('America/Sao_Paulo');
    $linha = "Ana;8.5\n";

    echo "$nomeExibicao <br>";

    var_dump($texto);
    var_dump($idade);
    var_dump($preco);
    var_dump($ativo);

    file_put_contents("notas.txt", $linha, FILE_APPEND);
    $conteudo = file_get_contents("notas.txt");

    echo "<br>" . strtoupper($nome_editado) . " " . strlen($nome_editado) . "<br>";
    echo calcular(200, $taxa) . "<br>";
    echo saudacao("Ulf") . "<br>"; 
    echo date("d/m/y") . "<br>";
    echo date("h:i:s") . "<br>";
    echo $conteudo . "<br>";
    echo situacao(8);

    echo "<br><img src='images.jpg'>";
?>