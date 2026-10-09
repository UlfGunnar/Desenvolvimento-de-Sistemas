<?php 
    require "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    if($_SERVER["REQUEST_METHOD"] !== "GET") {
        exit("Método inválido");
    };

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(!$id) {
        exit("ID inválido");
    }

    $sql = "DELETE FROM Anotacao WHERE id_anotacao  = :id_anotacao";
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute(["id_anotacao" => $id]);
    if ($stmt->rowCount() > 0) {
        Header("Location: ../index.php?sucesso_deletar=1");
        exit;
    } else {
        Header("Location: ../index.php?erro_atualizar_id=1");
        exit;
    }
?>