<?php
require_once 'conexao.php'; // Usa a conexão do MySQL com a variável $conn

if (!isset($categoria_do_jogo)) {
    $categoria_do_jogo = $_GET['cat'] ?? 'dq';
}

try {
    // Trocado $db por $conn
    $stmt = $conn->prepare("SELECT id_pergunta, texto_antes, texto_depois, dica FROM Perguntas WHERE categoria = ?");
    $stmt->execute([$categoria_do_jogo]);
    $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($perguntas) {
        foreach ($perguntas as $row) {
            ?>
            <div style="margin-bottom: 25px; background: #f9f9f9; padding: 15px; border-radius: 8px; border-left: 5px solid #007bff;">
                <p style="font-size: 1.1em; line-height: 1.6;">
                    <?php echo htmlspecialchars($row['texto_antes']); ?> 
                    
                    <input type="text" 
                           name="respostas[<?php echo $row['id_pergunta']; ?>]" 
                           required 
                           style="border: none; border-bottom: 2px solid #007bff; background: transparent; outline: none; width: 180px; text-align: center; font-weight: bold; color: #333;"> 
                    
                    <?php echo htmlspecialchars($row['texto_depois']); ?>
                </p>
                <small style="color: #666; display: block; margin-top: 5px;">
                    💡 <strong>Dica:</strong> <?php echo htmlspecialchars($row['dica']); ?>
                </small>
            </div>
            <?php
        }
        ?>
        <input type="hidden" name="categoria_do_jogo" value="<?php echo htmlspecialchars($categoria_do_jogo); ?>">

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" style="padding: 12px 30px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-size: 1.1em; cursor: pointer; font-weight: bold;">
                Verificar Minhas Respostas
            </button>
        </div>
        <?php
    } else {
        echo "<p>Nenhuma pergunta encontrada.</p>";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>