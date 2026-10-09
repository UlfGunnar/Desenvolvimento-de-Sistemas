<?php 
    require_once "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    $sql = "SELECT titulo, anotacao 
            FROM Anotacao 
            WHERE id_anotacao = :id;";

    $stmt = $conn->prepare($sql);
    $stmt -> execute([
        "id"    => $id
    ]);

    $anotacao = $stmt->fetch();
?>