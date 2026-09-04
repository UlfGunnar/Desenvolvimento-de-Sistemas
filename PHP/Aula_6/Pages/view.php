<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos cadastrados</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center; 
            height: 100vh;
            background: lightpink;
        }
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: whitesmoke;
            height: auto;
            width: 400px;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid black;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.342);
        }
        h2 {
            margin-bottom: 15px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            
        }
        thead {
            padding-right: 17px;
        }
        thead, tbody {
            display: block;
            width: 100%;
        }
        tbody {
            max-height: 200px; /* defina a altura que quiser */
            overflow-y: auto;
            overflow-x: hidden;
        }
        tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: palevioletred;
        }
        tr:nth-child(even) {
            background-color: rgb(255, 234, 253);
        }
        button{
            margin-top: 15px;
            background-color: pink;
            width: 70px;
            height: 30px;
            border-radius: 20px;
        }
        a:hover {
            background-color: rgb(255, 155, 171);
        }
        a:active {
            background-color: rgb(211, 110, 127);
        }
        a {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            background-color: pink;
            width: 70px;
            height: 30px;
            padding: 2px;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.445);
            text-decoration: none;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.514);
            color: white;
        }
        tbody::-webkit-scrollbar {
            width: 8px;
        }
        tbody::-webkit-scrollbar-thumb {
            background: lightpink;
            border-radius: 4px;
        }
        tbody::-webkit-scrollbar-track {
            background: #eee;
        }
    </style>
</head>
<body>
    <main>
        <h2>Alunos Cadastrados</h2>
        <table>
        
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Media</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    require_once "../Conexao/select.php";
                    $alunos = select();
                    foreach ($alunos as $aluno) {
                        echo "  <tr>
                                    <td>".$aluno['nome']."</td>
                                    <td>".$aluno['media']."</td>
                                    <td>".$aluno['situacao']."</td>
                                </tr>";
                    }
                ?>
                
            </tbody>
        
        </table>
        <a href="index.html">Voltar</a>
    </main>

    
</body>
</html>