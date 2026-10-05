<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Método inválido.");
}

$id    = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nome  = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$curso = trim($_POST["curso"] ?? "");
$data_nascimento = trim($_POST["data_nascimento"] ?? "");
$cidade = trim($_POST["cidade"] ?? "");
$periodo = trim($_POST["periodo"] ?? "");

if (!$id || $nome === "" || $email === "" || $curso === "" || $data_nascimento === "" || $cidade === "" || $periodo === "") {
    exit("Preencha todos os campos corretamente.");
}

$sql = "UPDATE alunos
        SET nome = :nome, email = :email, curso = :curso, data_nascimento = :data_nascimento, cidade = :cidade, periodo = :periodo
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "id"                => $id,
    "nome"              => $nome,
    "email"             => $email,
    "curso"             => $curso,
    "data_nascimento"   => $data_nascimento,
    "cidade"            => $cidade,
    "periodo"           => $periodo
]);

if ($stmt->rowCount() > 0) {
    echo "Aluno atualizado com sucesso!";
} else {
    echo "Nenhum registro foi alterado. Verifique o ID ou os dados informados.";
}
