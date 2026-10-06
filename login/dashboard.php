<?php
session_start();

// 1. SEGURANÇA: Verifica se o usuário está logado
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}

// 2. SEGURANÇA: Garante que APENAS profissionais da saúde acessem a dashboard
if($_SESSION['tipo'] !== 'profissional'){
    header("Location: index.php"); 
    exit;
}

require_once 'conexao.php';

// Busca os totais para os cartões de indicadores usando o MySQL ($conn)
$totalPacientes = $conn->query("SELECT COUNT(*) AS total FROM usuarios WHERE tipo_usuario='paciente'")->fetch(PDO::FETCH_ASSOC)['total'];

// Tenta buscar consultas e alto risco (evita travar a página se você ainda não criou a tabela 'consultas' no phpMyAdmin)
try {
    $totalConsultas = $conn->query("SELECT COUNT(*) AS total FROM consultas")->fetch(PDO::FETCH_ASSOC)['total'];
    $altoRisco = $conn->query("SELECT COUNT(*) AS total FROM consultas WHERE classificacao_risco='Alto Risco'")->fetch(PDO::FETCH_ASSOC)['total'];
} catch (Exception $e) {
    $totalConsultas = 0;
    $altoRisco = 0;
}

// Busca a lista de pacientes no MySQL para exibir na tabela
try {
    $stmt = $conn->query("SELECT id, nome, cpf, cidade FROM usuarios WHERE tipo_usuario='paciente' ORDER BY nome");
    $listaPacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $listaPacientes = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>podAI - Painel do Profissional</title>
    <style>
        :root{
            --azul: #123b7a;
            --azul-escuro: #0f2f61;
            --amarelo: #ffcc33;
            --cinza: #f5f6f8;
            --borda: #d9dde5;
            --vermelho: #dc3545;
            --verde: #28a745;
        }
        *{
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: var(--cinza);
            color: #333;
        }
        .topbar{
            background: var(--azul);
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: bold;
        }
        header{
            background: var(--azul-escuro);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { font-size: 24px; }
        .btn-site {
            background: var(--amarelo);
            color: black;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.2s;
        }
        .btn-site:hover { background: #e6b82c; }
        .btn-logout {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        .container{
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .boas-vindas {
            margin-bottom: 25px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .card {
            background: white;
            border: 1px solid var(--borda);
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            border-top: 5px solid var(--azul);
        }
        .card.perigo { border-top-color: var(--vermelho); }
        .card.sucesso { border-top-color: var(--verde); }
        .card h2 {
            font-size: 36px;
            color: #222;
            margin-bottom: 5px;
        }
        .card p {
            color: #666;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
        }
        .secao-tabela {
            background: white;
            border: 1px solid var(--borda);
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        }
        .secao-tabela h3 {
            color: var(--azul-escuro);
            margin-bottom: 20px;
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--borda);
        }
        th {
            background: #f8f9fa;
            color: var(--azul-escuro);
            font-weight: bold;
        }
        tr:hover { background: #fdfdfd; }
        .btn-acao {
            background: var(--azul);
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-acao:hover { background: var(--azul-escuro); }
    </style>
</head>
<body>

<div class="topbar">PAINEL DE CONTROLE ADMINISTRATIVO — podAI</div>

<header>
    <h1>podAI Dashboard</h1>
    <div>
        <a href="index.php" class="btn-site">🌐 Ir para o Site Principal</a>
        <a href="logout.php" class="btn-logout">Sair</a>
    </div>
</header>

<div class="container">
    <div class="boas-vindas">
        <h2>Olá, Dr(a). <?= htmlspecialchars($_SESSION['nome']); ?></h2>
        <p style="color: #666;">Acompanhe abaixo os indicadores clínicos e a lista de pacientes ativos no sistema.</p>
    </div>

    <div class="cards">
        <div class="card sucesso">
            <h2><?= $totalPacientes ?></h2>
            <p>Pacientes Cadastrados</p>
        </div>

        <div class="card">
            <h2><?= $totalConsultas ?></h2>
            <p>Triagens Realizadas</p>
        </div>

        <div class="card perigo">
            <h2><?= $totalAltoRisco ?></h2>
            <p>Pacientes em Alto Risco</p>
        </div>
    </div>

    <div class="secao-tabela">
        <h3>📋 Gerenciamento de Pacientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome do Paciente</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($listaPacientes)): ?>
                    <?php foreach($listaPacientes as $p): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($p['nome']) ?></strong></td>
                            <td><?= htmlspecialchars($p['cpf']) ?></td>
                            <td><?= htmlspecialchars($p['cidade']) ?></td>
                            <td style="text-align: center;">
                                <a href="ficha_paciente.php?id=<?= $p['id'] ?>" class="btn-acao">🔍 Abrir Prontuário</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: #999;">Nenhum paciente cadastrado até o momento.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>