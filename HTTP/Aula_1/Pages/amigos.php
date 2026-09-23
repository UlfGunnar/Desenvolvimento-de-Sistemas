<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h1>Amigos :)</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nível de gay</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once '../conn/select.php';

                    $pessoa = select();

                    foreach ($pessoa as $amigo) {
                        echo '<tr>
                                <td>'.$amigo['nome'].'</td>
                                <td>'.$amigo['nivel_gay'].'</td>
                              </tr>';
                    }
                ?>
            </tbody>
        </table>

        <a href="index.html">Voltar</a>
    </main>
</body>
</html>