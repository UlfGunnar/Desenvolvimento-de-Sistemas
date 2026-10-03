<?php 
    function selecionar_alunos($conn) {
        require_once "conn.php";

        try {
            $conn = criar_conexao();

            $conn -> exec('USE escola_formulario;');

            $sql = "SELECT * FROM alunos;";
            $stmt = $pdo->query($sql);

            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $alunos;
        } catch (PDOexception $e) {
            echo "[Falha] " . $e->getMessage();
        }
    }
?>
