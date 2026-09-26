<?php 
    require_once "PHP/conn.php";

    $conn = criar_conexao();
    criar_estrutura($conn);

    Header("Location: HTML/index.html")
?>