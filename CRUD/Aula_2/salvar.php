<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Método inválido.");
}

$nome  = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$curso = trim($_POST["curso"] ?? "");
$data_nascimento = trim($_POST["data_nascimento"] ?? "");
$cidade = trim($_POST["cidade"] ?? "");
$periodo = trim($_POST["periodo"] ?? "");

if ($nome === "" || $email === "" || $curso === "" || $data_nascimento === "" || $cidade === "" || $periodo === "") {
    exit("Preencha todos os campos corretamente.");
}

$sql = "INSERT INTO alunos (nome, email, curso, data_nascimento, cidade, periodo)
        VALUES (:nome, :email, :curso, :data_nascimento, :cidade, :periodo)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "nome"              => $nome,
    "email"             => $email,
    "curso"             => $curso,
    "data_nascimento"   => $data_nascimento,
    "cidade"            => $cidade,
    "periodo"           => $periodo
]);

echo "Aluno cadastrado com sucesso!";
