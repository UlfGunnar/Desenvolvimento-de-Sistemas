<?php 
    require_once "PHP/conn.php";

    $conn = criar_conexao();
    usar_banco($conn);

    $sql = "SELECT id_anotacao, titulo FROM Anotacao;";
    $stmt = $conn->query($sql);

    $anotacoes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco de LUCAs</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="DOC/Bloco_notas.ico" type="image/x-icon">
</head>

<body>

    <header>
        <h1>Bloco de LUCAs</h1>
    </header>

    <main>

        <div class="topo-notas">
            <h2>Minhas notas</h2>

            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Título</th>
                        <th>Vizualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anotacoes as $anotacao): ?>
                        <tr>
                            <td><?= htmlspecialchars($anotacao["id_anotacao"]) ?></td>
                            <td><?= htmlspecialchars($anotacao["titulo"]) ?></td>
                            <td>
                                <a href="HTML/Vizualizar.php?id=<?= (int) $anotacao["id_anotacao"] ?>">🔍</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="HTML/criar.php">
                <button class="criar">+ Criar nota</button>
            </a>
        </div>

        <div id="listaNotas" class="lista-notas">
        </div>

    </main>

    <footer>
        <h3>Todos os direitos reservados da LUCA Incorporation®</h3>
    </footer>

    <?php if (isset($_GET["sucesso"])): ?>
        <script>
            alert("Anotação salva com sucesso!");
            window.history.replaceState({}, "", "index.php");
        </script>
    <?php endif; ?>

    <?php if (isset($_GET["erro_atualizar_id"])): ?>
        <script>
            alert("ID não encontrado!");
            window.history.replaceState({}, "", "index.php");
        </script>
    <?php endif; ?>

    <?php if (isset($_GET["sucesso_deletar"])): ?>
        <script>
            alert("Anotação deletada com sucesso!");
            window.history.replaceState({}, "", "index.php");
        </script>
    <?php endif; ?>
</body>
</html>
