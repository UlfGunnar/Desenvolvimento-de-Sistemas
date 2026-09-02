<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro alunos</title>
</head>
<body>
    <?php 
        require_once "Conexao/Conexao.php";

        criar_conexao();
        header('Location: Pages/index.html');
    ?>
</body>
</html>