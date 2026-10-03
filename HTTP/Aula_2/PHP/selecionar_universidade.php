<?php 
    function selecionar_universade($conn) {
        require_once "conn.php";

        try {
            $conn = criar_conexao();

            $conn -> exec('USE escola_formulario;');

            $sql = "SELECT * FROM universidade;";
            $stmt = $pdo->query($sql);

            $universidade = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $universidade;
        } catch (PDOexception $e) {
            echo "[Falha] " . $e->getMessage();
        }
    }
?>