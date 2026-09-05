<?php 
    require_once 'DAO/conexao.php';
    require_once 'Class/class_leitor.php';

    criar_conexao();

    $nome = isset($_GET['nome']) ? $_GET['nome'] : False;
    $email = isset($_GET['email']) ? $_GET['email'] : False;

    if ($nome != False or $email != False) {
        $objeto_leitor = new leitor($nome, $email); 
    }
    

    Header('Location: Pages/index.html');
?>