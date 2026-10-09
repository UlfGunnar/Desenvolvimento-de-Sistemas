<?php 
    require_once "PHP/conn.php";

    $conn = criar_conexao();
    criar_estrutura($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="PHP/salvar.php" method="POST">
        <label for="">Titulo</label>
        <input type="text" name="titulo" >
        <textarea name="anotacao"></textarea>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>