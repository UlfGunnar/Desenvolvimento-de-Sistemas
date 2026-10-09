<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar nota - Bloco de LUCAs</title>
    <link rel="stylesheet" href="../CSS/style.css">
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
            <form action="../PHP/salvar.php" method="post">
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Digite o título..."
                    class="titulo"
                    maxlength=100
                >
                <textarea
                    id="conteudo"
                    placeholder="Comece a escrever..."
                    name="anotacao"
                    class="conteudo"
                ></textarea>
                <button type="submit" id="salvarNota">
                    Salvar nota
                </button>
            </form>
        </div>
    </main>

    <footer>
        <h3>Todos os direitos reservados da LUCA Incorporation®</h3>
    </footer>

    <?php if (isset($_GET["erro_criar"])): ?>
        <script>
            alert("Título Obrigatório!");
            window.history.replaceState({}, "", "criar.php");
        </script>
    <?php endif; ?>
</body>
</html>