<?php 
    require_once 'conn/conn.php';
    require_once 'conn/insert.php';
    require_once 'Class/classe.php';
    
    criar_conexao();

    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $nivel_gay = isset($_POST['nivel_gay']) ? $_POST['nivel_gay'] : false;

    if ($nome != "" and $nivel_gay != false) {
        $objeto_pessoa = new Pessoa($nome, $nivel_gay);

        inserir($objeto_pessoa);    
    }

    Header('Location: Pages/index.html');
?>