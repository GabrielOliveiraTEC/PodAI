<?php
require_once 'conexao.php'; // Usa a conexão do MySQL com a variável $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['respostas'])) {
    
    $respostas_usuario = $_POST['respostas'];
    $categoria = $_POST['categoria_do_jogo'] ?? 'dq'; // Pega a categoria (dq, pr ou ce)
    $acertos = 0;
    $total = count($respostas_usuario);

    try {
        foreach ($respostas_usuario as $id => $resposta) {
            // Trocado $db por $conn
            $stmt = $conn->prepare("SELECT resposta_correta FROM Perguntas WHERE id_pergunta = ?");
            $stmt->execute([$id]);
            $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($pergunta) {
                // Removido o utf8_encode() para preservar os acentos corretamente
                $correta = trim(mb_strtolower($pergunta['resposta_correta'], 'UTF-8'));
                $enviada = trim(mb_strtolower($resposta, 'UTF-8'));

                if ($enviada === $correta) {
                    $acertos++;
                }
            }
        }

        // Redireciona para o site principal com o resultado
        header("Location: index.php?p2=$categoria&status=concluido&acertos=$acertos&total=$total");
        exit;

    } catch (PDOException $e) {
        die("Erro ao validar respostas: " . $e->getMessage());
    }
} else {
    header("Location: index.php?p=home");
    exit;
}
?>