<?php 
    require_once "../PHP/conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    $sql = "SELECT id_anotacao, titulo, anotacao 
            FROM Anotacao 
            WHERE id_anotacao = :id_anotacao;";

    $stmt = $conn->prepare($sql);
    $stmt -> execute([
        "id_anotacao"    => $id
    ]);

    $anotacao = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Bloco de LUCAs</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="../DOC/Bloco_notas.ico" type="image/x-icon">
</head>
<body>

    <header>
        <h1>Bloco de LUCAs</h1>
    </header>

    <main>
        <a href="../index.php" class="voltar">
            <img src="../DOC/botaovoltar.png" alt="Voltar">
        </a>

        <div class="bloco">
            <form action="../PHP/atualizar.php" method="post">
                <input type="hidden" name="id" value="<?= (int) $anotacao["id_anotacao"] ?>">
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Digite o título..."
                    class="titulo"
                    maxlength=100
                    required
                    Value="<?= htmlspecialchars($anotacao["titulo"]) ?>"
                >
                <textarea
                    id="conteudo"
                    placeholder="Comece a escrever..."
                    name="anotacao"
                    class="conteudo"
                ><?= htmlspecialchars($anotacao["anotacao"] ?? "") ?></textarea>
                <button type="submit" id="salvarNota">
                    Atualizar
                </button>
                <a href="../PHP/deletar.php?id=<?= (int) $anotacao["id_anotacao"] ?>" onclick="return confirm('Deseja realmente apagar esta anotação?')">Excluir</a>
            </form>
        </div>
    </main>

    <footer>
        <h3>Todos os direitos reservados da LUCA Incorporation®</h3>
    </footer>

    <?php if (isset($_GET["erro_atualizar_titulo"])): ?>
        <script>
            alert("Título Obrigatório!");
            window.history.replaceState({}, "", "Vizualizar.php");
        </script>
    <?php endif; ?>
</body>
</html>