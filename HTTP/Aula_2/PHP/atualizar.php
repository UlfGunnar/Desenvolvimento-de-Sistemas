<?php 
    require "conn.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        echo "Método inválido";
        exit;
    }

    $id = (int) ($_POST["id"] ?? 0);
    $nome =  trim($_POST["nome"] ?? "");
    $id = trim($_POST["email"] ?? "");
    $id =  trim($_POST["curso"] ?? "");

    if ($id <= 0 || $nome === "" || $email === "" || $curso === "") {
        echo "Preencha todos os campos.";
        exit;
    }

    $sql = "UPDATE aluno
            Set nome = :nome, email = :email, curso = :curso
            Where id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        "id" => $id, "nome" => $nome,
        "email" => $email, "curso" => $curso
    ]);

    echo "Aluno atualizado com sucesso!";
?>