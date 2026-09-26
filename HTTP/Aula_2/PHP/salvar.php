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

        $nome =             trim($_POST["nome"] ?? "");
        $email =            trim($_POST["email"] ?? "");
        $curso =            trim($_POST["curso"] ?? "");
        $CPF =              trim($_POST["CPF"] ?? "");
        $turma =            trim($_POST["turma"] ?? "");
        $data_nascimento =  trim($_POST["data_nascimento"] ?? "");
        $telefone =         trim($_POST["telefone"] ?? "");
        $rua =              trim($_POST["rua"] ?? "");
        $bairro =           trim($_POST["bairro"] ?? "");
        $numero =           trim($_POST["numero"] ?? "");

        if ($nome === "" || $email === "" || $curso === "" ||
            $CPF === "" || $turma === "" || $data_nascimento === "" ||
            $telefone === "" || $rua === "" || $bairro === "" || $numero === "") {
            echo "Preencha todos os campos";
            exit;
        }

        $sql = "INSERT INTO alunos (CPF , nome, email, curso, turma, data_nascimento, telefone, rua, bairro, numero) 
                VALUES (:CPF, :nome, :email, :curso, :turma, :data_nascimento, :telefone, :rua, :bairro, :numero);";

        $stmt = $pdo->prepare($sql);
        $stmt -> execute ([
            "CPF" => $CPF,
            "nome" => $nome,
            "email" => $email,
            "curso" => $curso,
            "turma" => $turma,
            "data_nascimento" => $data_nascimento,
            "telefone" => $telefone,
            "rua" => $rua,
            "bairro" => $bairro,
            "numero" => $numero,
        ]); 

        echo "Aluno cadastro com sucesso!";

        Header('Location: ../HTML/index.html');
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
?>