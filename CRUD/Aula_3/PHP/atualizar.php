<?php 
    require "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        exit('Metódo inválido');
    }

    $id =       filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $titulo =   trim($_POST["titulo"] ?? "");
    $anotacao = trim($_POST["anotacao"] ?? "");
    $anotacao = ($anotacao === "") ? null : $anotacao;

    if (!$id) {
        Header("Location: ../index.php?erro_atualizar_id=1");
        exit;
    }

    if ($titulo === "") {
        Header("Location: ../HTML/Vizualizar.php?id=$id&erro_atualizar_titulo=1");
        exit;
    }

    $sql = "UPDATE Anotacao
            SET titulo = :titulo, anotacao = :anotacao
            WHERE id_anotacao = :id_anotacao;";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        "id_anotacao"        => $id,
        "titulo"    => $titulo,
        "anotacao"  => $anotacao
    ]);

    Header("Location: ../index.php?sucesso=1");
?>