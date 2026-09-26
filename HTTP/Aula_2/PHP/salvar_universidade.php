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

        $nome       = trim($_POST["nome"] ?? "");
        $CNPJ       = trim($_POST["CNPJ"] ?? "");
        $telefone   = trim($_POST["telefone"] ?? "");
        $rua        = trim($_POST["rua"] ?? "");
        $bairro     = trim($_POST["bairro"] ?? "");
        $numero     = trim($_POST["numero"] ?? "");

        if ($nome === "" || $CNPJ === "" || $telefone === "" || 
            $rua === "" || $bairro === "" || $numero === "") {
            echo "Preencha todos os campos";
            exit;
        }

        $sql = "INSERT INTO universidade (CNPJ , nome, telefone, rua, bairro, numero) 
                VALUES (:CNPJ, :nome, :telefone, :rua, :bairro, :numero);";

        $stmt = $pdo->prepare($sql);
        $stmt -> execute ([ 
            "CNPJ"      => $CNPJ,
            "nome"      => $nome,
            "telefone"  => $telefone,
            "rua"       => $rua,
            "bairro"    => $bairro,
            "numero"    => $numero,
        ]); 

        echo "Universidade cadastro com sucesso!";

        Header('Location: ../HTML/universidade.html');
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
?>