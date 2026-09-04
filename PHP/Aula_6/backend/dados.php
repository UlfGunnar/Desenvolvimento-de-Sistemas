<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "classes.php";
        require_once "../Conexao/insert.php";

        $nome = isset($_GET['nome']) ? $_GET['nome'] : '[não localizado]';
        $nota_1 = isset($_GET['nota_1']) ? $_GET['nota_1'] : 0;
        $nota_2 = isset($_GET['nota_2']) ? $_GET['nota_2'] : 0;
        $nota_3 = isset($_GET['nota_3']) ? $_GET['nota_3'] : 0;

        $media = ($nota_1 + $nota_2 + $nota_3) / 3;

        if ($media >= 7) {
            $situacao = "Aprovado"; 
        } elseif ($media >= 5) {
            $situacao = "Recuperação";
        } else {
            $situacao = "Reprovado";
        };

        $objeto_aluno = new aluno($nome, $media, $situacao);

        inserir($objeto_aluno); 

        header('Location: ../Pages/index.html')
    ?>
</body>
</html>