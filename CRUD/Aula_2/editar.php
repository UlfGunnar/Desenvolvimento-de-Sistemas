<?php 
    require "conexao.php";

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if ($id) {
        $sql = "SELECT id, nome, email, curso, data_nascimento, cidade, periodo, criado_em FROM alunos WHERE id = :id";   
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

    $aluno = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="card card-larga">
    <h1>CRUD de Alunos</h1>

    <section>
        <h2>Atualizar</h2>
        <form action="atualizar.php" method="POST">
            <label>ID</label>
            <input name="id" type="numberr" value="<?= htmlspecialchars($aluno["id"]) ?>" required readonly>

            <label>Nome</label>
            <input name="nome" type="text" value="<?= htmlspecialchars($aluno["nome"]) ?>" required>

            <label>E-mail</label>
            <input name="email" type="email" value="<?= htmlspecialchars($aluno["nome"]) ?>" required>

            <label>Curso</label>
            <input name="curso" type="text" value="<?= htmlspecialchars($aluno["curso"]) ?>" required>

            <label>Data de Nascimento</label>
            <input type="date" name="data_nascimento" value="<?= htmlspecialchars($aluno["data_nascimento"]) ?>" required>

            <label>Cidade</label>
            <input type="text" name="cidade" value="<?= htmlspecialchars($aluno["cidade"]) ?>" required>

            <label>Periodo</label>
            <input type="text" name="periodo" value="<?= htmlspecialchars($aluno["periodo"]) ?>">

            <button type="submit">Atualizar</button>
        </form>
    </section>
</main>
</body>
</html>
