<?php 
    require "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        exit('Metódo inválido');
    }

    $id =       filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $titulo =   trim($_POST["titulo"] ?? "");
    $anotacao = trim($_POST["anotacao"] ?? "");
    $anotacao = ($anotacao === "") ? null : $anotacao;

    if ($titulo === "") {
        exit("Preencha o título");
    }

    $sql = "UPDATE Anotacao
            SET titulo = :titulo, anotacao = :anotacao
            WHERE id = :id;";

    $stmt = $conn -> prepare($sql);
    $stmt = execute([
        "id"        => $id,
        "titulo"    => $titulo,
        "anotacao"  => $anotacao
    ]);

    echo "Anotacao atualizada!";
?>