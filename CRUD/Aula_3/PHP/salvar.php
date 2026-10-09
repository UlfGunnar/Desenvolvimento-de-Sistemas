<?php 
    require_once "conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        exit("[Erro HTTP] Método inválido");
    }

    $titulo = trim($_POST["titulo"] ?? "");
    $anotacao = trim($_POST["anotacao"] ?? "");
    $anotacao = ($anotacao === "") ? null : $anotacao;

    if ($titulo === "") {
        exit("Preencha o título");
    }

    $sql = "INSERT INTO Anotacao (titulo, anotacao)
            VALUES (:titulo, :anotacao);";

    $stmt = $conn->prepare($sql);
    $stmt -> execute([
        "titulo"    => $titulo,
        "anotacao"  => $anotacao
    ]);

    echo "Anotacao salva!";
?>