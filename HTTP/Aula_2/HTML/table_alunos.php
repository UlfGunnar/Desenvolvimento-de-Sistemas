<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
    <header>
        <a href="index.html">⭠ Voltar</a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Curso</th>
                    <th>Turma</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "../PHP/selecionar_alunos.php";

                    $alunos = selecionar_alunos();

                    foreach ($alunos as $aluno) {
                        echo "<tr>
                                <td>" . $aluno["nome"] . "</td>
                                <td>" . $aluno["CPF"] . "</td>
                                <td>" . $aluno["data_nascimento"] . "</td>
                                <td>" . $aluno["email"] . "</td>
                                <td>" . $aluno["telefone"] . "</td>
                                <td>" . $aluno["curso"] . "</td>
                                <td>" . $aluno["turma"] . "</td>
                                <td>" . $aluno["bairro"] . ", " . $alu . "</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>