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

    $sql = "DELETE FROM Anotacao WHERE id = :id";
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute(["id" => $id]);
    if ($stmt->rowCount() > 0) {
        echo "Anotação removida!";
    } else {
        echo "Anotação não encontrada";
    }
?>