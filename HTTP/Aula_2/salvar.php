<?php 
    $host = "localhost";
    $porta = 3407;
    $banco = "escola_formulario";
    $usuario = "root";
    $senha = "root";

    try {
        $pdo = new PDO (
            "mysql:host=$host;port=$porta;dbname=$banco;charset-utf8mb4",
            $usuario,
            $senha
        );

        $pdo -> setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            echo "Método inválido.";
            exit;
        }

        $nome = trim($_POST["nome"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $curso = trim($_POST["curso"] ?? "");

        if ($nome === "" || $email === "" || $curso === "") {
            echo "Preencha todos os campos";
            exit;
        }

        $sql = "INSERT INTO alunos (nome, email, curso) VALUES (:nome, :email, :curso);";

        $stmt = $pdo->prepare($sql);
        $stmt -> execute ([
            "nome" => $nome,
            "email" => $email,
            "curso" => $curso
        ]); 

        echo "Aluno cadastro com sucesso!";
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
?>