<?php 
    require_once "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    $sql = "SELECT id_anotacao, titulo FROM Anotacao;";
    $stmt = $conn->query($sql);

    $anotacoes = $stmt->fetchAll();
?>