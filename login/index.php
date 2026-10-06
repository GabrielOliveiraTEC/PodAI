<?php
session_start();

// Proteção da página: se não estiver logado, manda de volta para o login
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
?>
<?php
// 1. Pegue os valores da URL com segurança
$p = $_GET['p'] ?? 'home';
$p2 = $_GET['p2'] ?? null;
echo "<!-- DEBUG: p = $p, p2 = $p2 -->";

// 2. Seus arrays de títulos
$titulos_doencas = [
    'home' => 'PodAi',
    'informacao' => 'Informações sobre Vape e Saúde',
    'estatisticas' => 'Estatísticas do Projeto',
    'prototipo' => 'Protótipo de IA (Demonstração)',
    'sobre' => 'Sobre o Projeto',
    'asma' => 'Doença: Asma',
    'bronquite' => 'Doença: Bronquite',
    'alergia' => 'Doença: Alergia Respiratória',
    'sinusite' => 'Doença: Sinusite Crônica',
    'evali' => 'Doença: EVALI',
    'dependencia' => 'Dependência Química',
   
    'dq' => 'Game: Dependência Química',
    'pr' => 'Game: Problemas Respiratórios',
    'ce' => 'Game: Cigarros Eletrônicos'
];

// 3. A Lógica para o título da página
if (isset($titulos_doencas[$p])) {
    $titulo_pagina = $titulos_doencas[$p];
} elseif ($p2 && isset($titulos_doencas[$p2])) {
    $titulo_pagina = $titulos_doencas[$p2];
} else {
    $titulo_pagina = 'Página não encontrada';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($titulo_pagina) ?></title>
<style>

.flex-container {
    display: flex; 
    align-items: center; 
    gap: 20px; 
}


.imagem-com-descricao {
    max-width: 50%; 
    height: auto; 
}


.descricao-da-imagem {
    flex-grow: 1; 
}


@media (max-width: 768px) {
    .flex-container {
        flex-direction: column; 
        gap: 10px; 
        align-items: flex-start; 
    }

    .imagem-com-descricao {
        max-width: 100%; 
    }
}

:root {
    --azul:#123b7a;
    --azul-escuro:#0f2f61;
    --amarelo:#ffcc33;
    --cinza:#f5f6f8;
    --texto:#1d1d1d;
    --link:#0a6cff;
    --borda:#e2e3e7;
    --verde:#2e7d32;
}
* {
    box-sizing:border-box;
}
body {
    margin:0;
    font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
    color:var(--texto);
    background:#DFE9F5;
}
.topbar {
    background:var(--azul);
    color:#fff;
    padding:8px 16px;
    font-size:14px;
}
.topbar .brand {
    display:flex;
    align-items:center;
    gap:8px;
    font-weight:600;
}
.topbar .brand span.logo {
    display:inline-block;
    width:10px;
    height:10px;
    border-radius:50%;
    background:var(--amarelo);
}
header {
    background:var(--azul-escuro);
    color:#fff;
    padding:20px 16px;
}
header h1 {
    margin:0;
    font-size:22px;
    line-height:1.3;
}
header p {
    margin:6px 0 0 0;
    opacity:.9;
}
nav {
    background:#fff;
    border-bottom:1px solid var(--borda);
}
.nav-inner {
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    padding:10px 16px;
}
nav a {
    color:var(--azul-escuro);
    text-decoration:none;
    padding:8px 12px;
    border-radius:6px;
}
nav a.active,
nav a:hover {
    background:var(--cinza);
}
.container {
    max-width:1100px;
    margin:0 auto;
    padding:16px;
}
.grid {
    display:grid;
    grid-template-columns:260px 1fr;
    gap:16px;
}
@media (max-width: 880px) {
    .grid {
        grid-template-columns:1fr;
    }
}
.side {
    background:var(--cinza);
    padding:12px;
    border:1px solid var(--borda);
    border-radius:8px;
}
.side h3 {
    margin:8px 8px 10px;
    font-size:15px;
}
.side ul {
    list-style:none;
    padding:0;
    margin:0;
}
.side li {
    border-top:1px solid var(--borda);
}
.side li:first-child {
    border-top:none;
}
.logo-img {
    height: 80px;   /* controla o tamanho */
    width: auto;    /* mantém proporção */
  
}
.side a {
    display:block;
    padding:10px 8px;
    color:var(--texto);
    text-decoration:none;
}
.side a:hover {
    background:#fff;
}
.content {
    min-height:360px;
}
header.container {
    display: flex;
    align-items: center;  /* Alinha verticalmente ao centro */
    gap: 20px;            /* Espaço entre a logo e o texto */
    flex-wrap: wrap;      /* Para quebrar linha em telas pequenas */
}

header .logo {
    width: 178px;          /* Ajuste o tamanho conforme necessário */
    height: auto;
    flex-shrink: 0;       /* Impede a logo de encolher */
}

header h1 {
    margin: 0;            /* Remove margens padrão */
    flex: 1;              /* Ocupa o espaço restante */
    font-size: 22px;
}

header p {
    width: 100%;          /* O parágrafo fica em baixo em linha inteira */
    margin: 6px 0 0 0;
}
.card {
    background:#fff;
    border:1px solid var(--borda);
    border-radius:8px;
    padding:16px;
    margin-bottom:16px;
}
.card h2 {
    margin:0 0 10px;
    font-size:20px;
}
.card p {
    margin:8px 0;
}
.muted {
    opacity:.8;
}
.alert {
    border-left:6px solid var(--amarelo);
    background:#fff8e1;
    padding:12px;
    border-radius:6px;
}
.breadcrumb {
    font-size:13px;
    margin-bottom:10px;
}
.breadcrumb a {
    color:var(--link);
    text-decoration:none;
}
table {
    width:100%;
    border-collapse:collapse;
}
th,td {
    border:1px solid var(--borda);
    padding:8px;
    text-align:left;
}
th {
    background:var(--cinza);
}
.btn {
    display:inline-block;
    padding:10px 14px;
    border-radius:8px;
    border:1px solid var(--borda);
    text-decoration:none;
}
.btn.primary {
    background:var(--azul);
    color:#fff;
    border-color:transparent;
}
.btn.secondary {
 background:var(--azul);
    color:#fff;
    border-color:transparent;}

/* Balões integrados */
.baloes-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px 20px;
    margin-top:12px;
}
.balao {
    border:2px solid #ccc;
    border-radius:30px;
    padding:12px 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:all 0.2s;
    text-decoration:none;
    color:#1d1d1d;
    position:relative;
    font-weight:600;
    font-size:14px;
}
.balao::before {
    content: '';
    width: 0;
    height: 0;
    border-left: 10px solid red;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
    position: absolute;
    left: -12px;
    top: 50%;
    transform: translateY(-50%);
}
.balao:hover {
    background:#f5f6f8;
    border-color:#999;
}
footer {
    border-top:1px solid var(--borda);
    padding:20px 16px;
    margin-top:24px;
    font-size:14px;
    color:#555;
}
.image-description-container {
overflow: auto; /* Clear the float */
}

.image-description-container img {
float: right;
margin-left: 15px; /* Adjust spacing */
}



</style>
<link rel="icon" type="image/png" href="img/iconeSite.png"> <!--Mudar ícone da página-->
</head>
<body>
<div class="topbar">
    <div class="brand"><span class="logo"></span> Portal Saúde — Projeto Acadêmico</div>
</div>

<header class="container" style="padding: 10px 16px; background: var(--azul-escuro);">
    <div style="display: flex; align-items: center;">
        <a href="?p=home" style="display: inline-block; line-height: 0;">
             <img src="img/logotipoPODAI.png" class="logo-img">
        </a>
        <h1 style="margin: 0; padding: 0; color: white; font-size: 30px; line-height: 1.3; margin-left: 15px;">Sistema de IA integrado a um site para conscientização do uso de Cigarros eletrônicos Respiratório em Adolescentes</h1>
    </div>
    <p class="muted" style="margin: 0px; color: rgba(255,255,255,0.9);font-size: 18.2px; font-family: 'Times New Roman' "><b>Site informativo e demonstrativo em torno de depência química e problemas respiratórios desencadeados pelo uso de cigarros eletrônicos</b></p>
    
    
    <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'profissional'): ?>
    <div style="background: #abbef0; padding: 12px; text-align: center; font-weight: bold; margin-bottom: 20px; border-radius: 8px;">
        <span style="color: black;">Você está navegando como Profissional da Saúde.</span>
        <a href="dashboard.php" style="color: #0f2f61; margin-left: 15px; text-decoration: underline;">
            🎛️ Voltar para o Dashboard
        </a>
    </div>
<?php endif; ?>


</header>
<nav>
    <div class="nav-inner container">
        <a href="?p=home" class="<?= $p==='home'?'active':'' ?>">Página Inicial</a>
        <a href="?p=informacao" class="<?= $p==='informacao'?'active':'' ?>">Informação</a>
        <a href="?p=estatisticas" class="<?= $p==='estatisticas'?'active':'' ?>">Estatísticas</a>
        <a href="?p=prototipo" class="<?= $p==='prototipo'?'active':'' ?>">Protótipo de IA</a>
        <a href="?p=sobre" class="<?= $p==='sobre'?'active':'' ?>">Sobre</a>
        <a href="logout.php" class="btn-logout" style="color: #0f2f61; font-weight: bold; text-decoration: none;">
    🚪 Sair do Sistema
</a>
    </div>
</nav>
<main class="container grid">

<aside class="side">
    <h3>Navegue</h3>
    <ul>
        <li><a href="?p=home">Sobre o projeto</a></li>
         <li><a href="?p=dependencia#riscos">Depedência Química</a></li>
        <li><a href="?p=informacao#riscos">Riscos Respiratórios</a></li>
        <li><a href="?p=prototipo">Conversar com a IA</a></li>
    </ul>

    <h3>Problemas Respiratórios</h3>
    <div class="baloes-grid">
        <a href="?p=asma" class="balao" style="border-color:#2e7d32;">Asma</a>
        <a href="?p=bronquite" class="balao" style="border-color:#1565c0;">Bronquite</a>
        <!--<a href="?p=alergia" class="balao" style="border-color:#fbc02d;">Alergia Respiratória</a>-->
        <a href="?p=sinusite" class="balao" style="border-color:#f57c00;">Sinusite Crônica</a>
        <a href="?p=evali" class="balao" style="border-color:#d32f2f;">EVALI</a>
    </div>
     <h3>Nossos Games Educativos!</h3>
    <div class="baloes-grid">
        <a href="?p2=dq" class="balao" style="border-color:#2e7d32;">Dependência Química</a>
        <a href="?p2=pr" class="balao" style="border-color:#1565c0;">Problemas Respirátorios</a>
        <a href="?p2=ce" class="balao" style="border-color:#fbc02d;">Cigarros Eletrônicos</a>
    </div>
</aside>

<section class="content">
    <div class="breadcrumb">
        <a href="?p=home">Início</a> › <?= htmlspecialchars($titulo_pagina) ?>
    </div>
    
    <?php
    
    if (isset($_GET['status']) && $_GET['status'] == 'concluido'): ?>
        <div style="background-color: #acd9f7; color: #4464f1; padding: 20px; border: 2px solid #93bcf8; border-radius: 10px; text-align: center; margin-bottom: 20px; font-family: sans-serif;">
            <h2 style="margin: 0;">🎉 Jogo Finalizado!</h2>
            <p style="font-size: 1.1em;">Você acertou <strong><?= $_GET['acertos'] ?></strong> de <strong><?= $_GET['total'] ?></strong> perguntas.</p>
            <a href="index.php?p=home" style="display: inline-block; margin-top: 10px; color: #fcfcfc; font-weight: bold; text-decoration: underline;">Voltar ao início</a>
        </div> 
        <?php endif;

    if($p2 === 'dq') { ?>
        <div class="card">
            <h2><?= htmlspecialchars($titulos_doencas['dq']) ?></h2>
    
            <p>Este jogo educativo aborda os mecanismos da dependência química causada pela nicotina.</p>
            
            <form action="verificar.php" method="POST">
                <?php 
                $categoria_do_jogo = 'dq'; // Define que este é o jogo de Dependência Química
                include 'exibir_perguntas.php'; 
                ?>
            </form>
        </div>

    <?php } elseif($p2 === 'pr') { ?>
        <div class="card">
            <h2><?= htmlspecialchars($titulos_doencas['pr']) ?></h2>
            <p>Aprenda sobre os principais problemas respiratórios associados ao uso de vapes.</p>
            
            <form action="verificar.php" method="POST">
                <?php 
                $categoria_do_jogo = 'pr'; // Define que este é o jogo de Problemas Respiratórios
                include 'exibir_perguntas.php'; 
                ?>
            </form>
        </div>

    <?php } elseif($p2 === 'ce') { ?>
        <div class="card">
            <h2><?= htmlspecialchars($titulos_doencas['ce']) ?></h2>
            <p>Descubra como funcionam os cigarros eletrônicos e seus riscos.</p>
            
            <form action="verificar.php" method="POST">
                <?php 
                $categoria_do_jogo = 'ce'; // Define que este é o jogo de Cigarros Eletrônicos
                include 'exibir_perguntas.php'; 
                ?>
            </form>
        </div>
    <?php } elseif($p === 'home') { ?>
        <div class="card">
            <h2>O que é o projeto?</h2>
            <p>O podAI, trata-se de um projeto dedicado a conscientização sobre os riscos que os Cigarros Eletrônicos (popularmente conhecidos como VAPE) trazem a saúde respiratória. Atravéz de nosso sistema com Inteligência Artificial aplicada, usaremos um sistema onde o usuário fará uma espécie de auto-atendimento para que seja possível identificar se existe algum sintoma de EVALI's (Lesão Pulmonar Associada ao Uso de Cigarros Eletrônicos ou Vaporizadores) ou outras doenças referentes ao uso do vape. Nosso público alvo são adolesecentes e jovenss, visto que de acordo com as estatíscas de uma pesquisa da Unesp, 1 a cada 9 adolescentes dentre os 16 mil entrevistados afirmam usar ou já ter usado Cigarros Eletrônicos, o que é muito preocupante.</p>
            <p>A ideia é fornecer informações e um protótipo de IA para auxiliar no entendimento dos riscos envolvidos.</p><br>
            <p class="alert">⚠️ <strong>Atenção:</strong> este é um projeto acadêmico. As informações aqui <em>não substituem</em> avaliação médica.</p>
            <p><br>
            <a class="btn primary" href="?p=prototipo">Conversar com a IA</a>
            <a class="btn primary" href="?p=informacao">Saiba mais</a>
            </p>
        </div>

        <div class="card">
            <h2>Participe da Nossa Pesquisa</h2>
            <p>Para nos ajudar a entender melhor os hábitos e riscos do uso de pods, por favor, responda ao nosso formulário. Sua participação é muito importante para o nosso projeto acadêmico!</p>
            <p>
            <a class="btn primary" href="https://docs.google.com/forms/d/e/1FAIpQLSfskBHYfH6Z1-xXqv5ROB7Lc9LAEiG2KOjixz3U8VVGKF_3cw/viewform?usp=sharing&ouid=114133862636125806140" target="_blank">Acessar o Formulário</a>
            </p>
        </div>

        <div class="card">
            <h2>Vídeo explicativo</h2>
            <p>Assista ao vídeo curto explicando os riscos do vape e como a IA ajuda na conscientização.</p>
            <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:100%;height:auto;">
              <iframe src="https://www.youtube.com/embed/xG_jQwvIOKw" 
                      frameborder="0" 
                      style="position:absolute;top:0;left:0;width:100%;height:100%;" 
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                      allowfullscreen 
                      title="Os riscos do cigarro eletrônico: 'É como fumar 20 por dia'"></iframe>
            </div>
        </div>

        <div class="card">
            <h2>Depoimentos</h2>
            <blockquote>
                <p>"Eu nunca pensei que usar vape pudesse afetar tanto minha saúde. Esse sistema de IA me ajudou a entender os riscos."</p>
                <footer>— João, 17 anos</footer>
            </blockquote>
            <blockquote>
                <p>"O vídeo foi muito esclarecedor! A IA é uma ótima ferramenta para a gente se cuidar melhor."</p>
                <footer>— Maria, 16 anos</footer>
            </blockquote>
            <blockquote>
                <p>"Gostei do projeto, me ajudou a perceber sintomas que eu ignorava."</p>
                <footer>— Lucas, 18 anos</footer>
            </blockquote>
        </div>

   <?php } elseif($p === 'dependencia') { ?>
        <div class="card">
            <table>
                <tr>
                    <td>
                    <h2 style="color: #0b7ae2";>Depedência Química e o nosso Mecanismo de defesa contra Nicotina</h2>
                    <p>Os Cigarros Eletrônicos, mais conhecidos como pods ou vapes, têm se popularizado nos últimos anos entre os mais jovens por sua "fama" e pelo seu fácil acesso.Apesar de ser apresentado como inofensivo , esses dispositivos também são derivados do tabaco e, portanto, estão ligados diretamente ao tabagismo, doença crônica causada pela dependência à nicotina presente nos produtos à base de tabaco. </p>
                    <p>A adolescência abrange um período sensível do desenvolvimento, caracterizado por maior vulnerabilidade clínica à nicotina, ao tabaco e aos cigarros eletrônicos. Embora existam influências socioculturais, dados pré-clínicos e clínicos indicam que essa sensibilidade adolescente possui fortes fundamentos neurobiológicos. </p>
                </td>
                </tr>
            </table>
            <table>
                <tr>
                     <center><h1 style="color: #0b7ae2";> Nosso infográfico conscientizativo:</h1></center></font-color>
                  <center><img src="img/podAI.png" alt= "Imagem ilustrativa de Cigarros Eletrônicos"; width="460px"></center>
                </tr>
            </table>
           <div style="text-align: center; margin: 0; padding: 20px 0 10px 0;">
    <h3 style="color: #1a60b1; margin: 0; font-family: sans-serif;">Como tudo começa?</h3>
    <h2 style="color: #0b7ae2; margin: 5px 0; font-family: sans-serif;">Tudo começa com a Dependência Química no Sistema Nervoso</h2>
    <p style="margin: 10px 0; color: #666; font-style: italic;">
       <p class="dqcontinuar"> Continue a leitura para mais informações... <strong>Você não irá se arrepender!</strong></p>
    </p>
</div>



<div style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; background-color: #ffffff; margin: 0; padding: 0;">
    
    <div style="background-color:#fff ; min-width: 100px; max-width: 200px;  margin: 0; padding: 0.9;">
        <img src="img/teste2.png" alt="Sistema de Recompensa" style="width: 110%">
    </div>

    <div style="flex: 2; min-width: 330px; padding: 30px; box-sizing: border-box;">
        <p style="font-size: 1.0 em; line-height: 2.4; color: #000000; text-align: justify; margin: 1;">
            O <strong>sistema mesolímbico</strong>, também conhecido como sistema de recompensa, é o responsável por processar tudo o que nos traz prazer. 
            Quando fazemos algo positivo, o cérebro associa esse estímulo a um resultado desejável, liberando substâncias coordenadas. 
            Nesse processo, a <strong>dopamina</strong> ocupa uma posição central, sendo essencial para dar valor às nossas ações básicas e motivação para repetir comportamentos saudáveis.
        </p>
    </div>
</div>

           
    <?php } elseif($p === 'informacao') { ?>
        <div class="card">
            <table> <tr> <td><h1 style="color: #0b7ae2";>Informações sobre Vape e Saúde</h1>
<p style="color: #0058aa";><b>O cigarro eletrônico é uma alternativa ao cigarro tradicional, mas não é isento de riscos.</b></p>
<p>Seu uso pode causar irritações e inflamações nas vias aéreas, aumentando o risco de doenças respiratórias.</p>

<p class="dqcontinuar"> 
    O líquido utilizado nesses dispositivos contém diversos compostos químicos que afetam diretamente a saúde pulmonar. Entre eles, destaca-se o Diacetil, substância empregada na aromatização dos cigarros eletrônicos, cuja inalação está associada ao desenvolvimento de Bronquite Obliterante, condição popularmente conhecida como "Pulmão de Pipoca". Esse achado evidencia que, mesmo sem o processo de combustão, os dispositivos eletrônicos para fumar apresentam riscos significativos à saúde respiratória.
</p>

<div class="sessao-conteudo" style="display: flex; align-items: center; justify-content: flex-start; gap: 20px; max-width: 1000px; margin: 20px 0;">
    
    <div class="caixa-informativa" style="background-color: #fff4d1; border-left: 8px solid #f0ad4e; padding: 20px; border-radius: 4px; width: 580px; flex-shrink: 0; font-family: sans-serif;">
        <p style="margin: 0;">
            É de extrema importância mencionar o acetato de vitamina E, frequentemente encontrado como diluente em essências que contêm THC, o principal componente da cannabis. Embora essa substância seja segura para ingestão ou uso na pele, sua inalação é extremamente perigosa. Quando aquecido e transformado em vapor, o acetato de vitamina E adere ao tecido pulmonar, interferindo diretamente na troca de oxigênio e podendo causar inflamações severas conhecidas como lesões pulmonares associadas ao vaping. Por ser um óleo que o pulmão não consegue processar, ele representa um risco grave à saúde respiratória, exigindo atenção redobrada sobre a procedência e a composição dos produtos utilizados.
        </p>
    </div>

    <img src="img/info.png" alt="Ilustração Pulmonar" style="width: 300px; height: auto; flex-shrink: 0; display: block;">
                
</div> 
</td>
</tr>
</table>
            <table>
                
                <tr>
                    <caption> <h1 style="color: #0b7ae2";>Tipos de Cigarros Eletrônicos: </h1></caption>
                    <th style="color: #0b7ae2";>Cigalike</th>
                    <td>Dispositivo pequeno e descartável, parecido com um cigarro comum, que contém pouca nicotina — apesar do formato inofensivo, pode causar dependência e irritação pulmonar. </td>
                </tr>
                <tr>
                    <th style="color: #0b7ae2";>Vape Pen</th>
                    <td>Caneta vaporizadora recarregável com cartucho de líquido — mais potente que os cigalikes e aumenta o risco de inflamação pulmonar e exposição prolongada à nicotina.</td>
                </tr>
                <tr>
                    <th style="color: #0b7ae2";>Mods de Cixa</th>
                    <td>Aparelhos grandes e personalizáveis com baterias potentes — produzem mais vapor e nicotina, o que eleva o risco de bronquite crônica e lesões pulmonares como a EVALI.</td>
                </tr>
                <tr>
                    <th style="color: #0b7ae2";>Pod System: </th>
                    <td>Dispositivos compactos e modernos com cartuchos de líquido com alta concentração de nicotina — muito populares entre jovens, causam vício rápido e podem prejudicar o desenvolvimento pulmonar.</td>
                </tr>
            </table>
              <table>
                <tr>
                     <center><h1 style="color: #0b7ae2";> Nosso infográfico conscientizativo:</h1></center></font-color>
                  <center><img src="img/info2.png" alt= "Imagem ilustrativa de Cigarros Eletrônicos"; width="400px"></center>
                </tr>
            </table>
           

        
                    </div>
                   
                </div>
            </div>
        </div>
        
 <?php } elseif($p === 'estatisticas') { ?>
        <div class="card">
            <h2>Estatísticas e Relatório do Projeto</h2>
            <p class="dqcontinuar">⚠️ <strong>Atenção:</strong> Nosso projeto está em constante mudança e em desenvolvimento, contudo, as estatísticas apresentadas abaixo estão sujeitas a mudanças</p>
            <p><br>
       <div style="display: flex; flex-wrap: nowrap; align-items: center; background: #f9f9f9; border-radius: 15px; overflow: hidden; padding: 10px; gap: 20px;">

    <div style="flex: 2; display: flex; justify-content: center;">
        <img src="img/result1.png" alt="Resultado 1" style="width: 108%; max-width: 550px; height: auto; border-radius: 10px; display: block;">
    </div>

    <div style="flex: 1; padding: 10px; box-sizing: border-box; min-width: 200px;">
        <p style="font-size: 0.95em; line-height: 1.5; color: #333; text-align: justify; margin: 0;">
            Ao lado temos a pergunta principal do <strong>Formulário do podAI</strong>, a fim de compreender as principais faixas etárias atingidas. Como esperado, a mais atingida é o público jovem <strong>entre os 14-18 anos</strong>, o que colocou a equipe do podAI em alerta pela alta disseminação do produto de forma concentrada nessa faixa.
        </p>
    </div>

        </p>
    </div>
     <div style="display: flex; flex-wrap: nowrap; align-items: center; background: #f9f9f9; border-radius: 15px; overflow: hidden; padding: 10px; gap: 20px;">

    <div style="flex: 2; display: flex; justify-content: center;">
        <img src="img/result2.png" alt="Resultado 2" style="width: 108%; max-width: 550px; height: auto; border-radius: 10px; display: block;">
    </div>

    <div style="flex: 1; padding: 10px; box-sizing: border-box; min-width: 200px;">
        <p style="font-size: 0.95em; line-height: 1.5; color: #333; text-align: justify; margin: 0;">
    O gráfico indica o nível de experimentação do produto entre os entrevistados. Os dados revelam que a maioria absoluta dos participantes <b>(66,7%)</b> já teve contato ou utiliza o dispositivo, evidenciando a alta taxa de disseminação do cigarro eletrônico na amostra pesquisada.        </p>
    </div>

        </p>
    </div>
     <div style="display: flex; flex-wrap: nowrap; align-items: center; background: #f9f9f9; border-radius: 15px; overflow: hidden; padding: 10px; gap: 20px;">

    <div style="flex: 2; display: flex; justify-content: center;">
        <img src="img/result3.png" alt="Resultado 3" style="width: 108%; max-width: 550px; height: auto; border-radius: 10px; display: block;">
        
    </div>

    <div style="flex: 1; padding: 10px; box-sizing: border-box; min-width: 200px;">
        <p style="font-size: 0.95em; line-height: 1.5; color: #333; text-align: justify; margin: 0;">
           Este gráfico mapeia a preferência pelos modelos de dispositivos disponíveis no mercado. O formato:<b>PodSystem</b>,
           Mencionado na página: <a href="?p=informacao">Informação</a>, 
           destaca-se como o mais consumido (69%), seguido pela Vape Pen (33,3%), mostrando a preferência do público por aparelhos mais compactos e com alta concentração de nicotina.
        </p>
    </div>

        </p>
    </div>

</div>
        
    <?php } elseif ($p === 'prototipo') { ?>
        <div class="card">
            <h2>Protótipo de IA - podAI</h2>
            <p>Tire suas dúvidas sobre a saúde do seu sistema respiratório. Nossa IA ajuda você a identificar sinais e entender os perigos do vaping de forma simples e rápida.

<br><strong>Nota: Este sistema fornece informações educativas, não diagnósticos médicos.</strong></p>

            <!-- Interface do Chatbot -->
            <div id="chat-container" style="border:1px solid var(--borda); border-radius:8px; padding:16px; margin-top:16px; height: 450px; overflow-y: scroll; display: flex; flex-direction: column; gap: 10px; background-color: #fdfdfd;">
                <!-- As mensagens do chat aparecerão aqui -->
            </div>
            <div id="opcoes-container" style="margin-top:12px; display:flex; flex-wrap:wrap; gap:10px; padding: 10px 0;">
                <!-- Os botões de resposta aparecerão aqui -->
            </div>
            <!-- Fim da Interface do Chatbot -->
        </div>

        <!-- SCRIPT COMPLETO DO CHATBOT EM JAVASCRIPT -->
        <script>
            // --- ELEMENTOS DA PÁGINA ---
            const chatContainer = document.getElementById('chat-container');
            const opcoesContainer = document.getElementById('opcoes-container');

            // --- DADOS E LÓGICA DO CHATBOT ---
            let pontuacaoRisco = 0;
            let historicoRespostas = {}; // Guardar as respostas do usuário

            const descricoesSintomas = "<strong>Tosse persistente:</strong> irritação contínua nas vias aéreas.<br><strong>Falta de ar:</strong> sensação de não conseguir respirar fundo.<br><strong>Dor no peito:</strong> pode indicar inflamação pulmonar.<br><strong>Chiado no peito:</strong> um som agudo ao respirar, sinal de vias aéreas estreitas.<br><strong>Cansaço excessivo:</strong> pode indicar que seus pulmões não estão 100%.";

            const informacoesMedicas = {
    paulinia: "<strong>Em Paulínia:</strong><br>" +
              "• <a href='https://portal.paulinia.sissonline.com.br/' target='_blank' style='color: #0a6cff; font-weight: bold; text-decoration: underline;'>Portal da Saúde de Paulínia (Agendamento Online)</a><br>" +
              "• Hospital Municipal de Paulínia (HMP)<br>" +
              "• Unidades Básicas de Saúde (UBS) nos bairros.",

    campinas: "<strong>Em Campinas:</strong><br>" +
              "• <a href='https://sites.google.com/hc.unicamp.br/portaldopaciente/' target='_blank' style='color: #0a6cff; font-weight: bold; text-decoration: underline;'>Portal do Paciente - HC Unicamp</a><br>" +
              "• <a href='https://www.saude.campinas.sp.gov.br/' target='_blank' style='color: #0a6cff; font-weight: bold; text-decoration: underline;'>Portal da Saúde Campinas / Rede Mário Gatti</a><br>" +
              "• Centros de Saúde (CS) por toda a cidade.",

    sumare: "<strong>Em Sumaré:</strong><br>" +
            "• <a href='https://www.hes.unicamp.br/' target='_blank' style='color: #0a6cff; font-weight: bold; text-decoration: underline;'>Hospital Estadual de Sumaré (HES - Unicamp)</a><br>" +
            "• UPA Macarenko<br>" +
            "• Unidades de Saúde da Família (USF).",

    hortolandia: "<strong>Em Hortolândia:</strong><br>" +
                 "• <a href='https://www meuhortolandia.sp.gov.br/' target='_blank' style='color: #0a6cff; font-weight: bold; text-decoration: underline;'>Prefeitura de Hortolândia - Serviços de Saúde</a><br>" +
                 "• Hospital Municipal Mário Covas<br>" +
                 "• UPAs Jardim Rosolém e Amanda"
};

            const fluxoConversa = [
                { id: 'inicio', texto: 'Olá! Sou o podAI, seu assistente de conscientização. Para começar, em qual faixa etária você se encontra?', opcoes: ['Menos de 16 anos', 'Entre 16 e 17 anos', 'Mais de 18 anos'], proxima: 'usou_vape' },
                { id: 'usou_vape', texto: 'Obrigado. Agora, me diga: você utiliza ou já utilizou algum tipo de Cigarro Eletrônico?', opcoes: ['Sim, já experimentei', 'Não, nunca experimentei'], proxima: (resposta) => resposta === 'Sim, já experimentei' ? 'frequencia' : 'fim_positivo' },
                { id: 'frequencia', texto: 'Com qual frequência?', opcoes: ['Diariamente', 'Semanalmente', 'Apenas socialmente'], pontuacao: {'Diariamente': 8, 'Semanalmente': 5, 'Apenas socialmente': 2}, proxima: 'info_sintomas' },
                { id: 'info_sintomas', texto: 'Entendi. Alguns usuários relatam sentir sintomas após o uso. Gostaria de ler uma breve descrição sobre os mais comuns?', opcoes: ['Sim, por favor', 'Não, obrigado'], proxima: (resposta) => { if (resposta === 'Sim, por favor') { adicionarMensagem(descricoesSintomas, 'bot', true); } return 'selecionar_sintomas'; } },
                {
                    id: 'selecionar_sintomas', type: 'multiselect', texto: 'Dentre os seguintes sintomas, selecione TODOS que você já sentiu ou sente após começar o consumo. Depois, clique em "Continuar".',
                    opcoes: ['Tosse persistente', 'Falta de ar', 'Dor no peito', 'Chiado no peito', 'Catarro ou muco excessivo', 'Cansaço ao realizar atividades simples'],
                    pontuacao: {'Tosse persistente': 4, 'Falta de ar': 8, 'Dor no peito': 8, 'Chiado no peito': 6, 'Catarro ou muco excessivo': 3, 'Cansaço ao realizar atividades simples': 5},
                    proxima: 'sente_falta'
                },
                { id: 'sente_falta', texto: 'Você sente falta (desejo/fissura) de consumir cigarros eletrônicos após um período de tempo sem usar?', opcoes: ['Sim, após algumas horas', 'Sim, após alguns dias', 'Não sinto falta'], pontuacao: {'Sim, após algumas horas': 7, 'Sim, após alguns dias': 4, 'Não sinto falta': 0}, proxima: 'problema_respiratorio' },
                {
                    id: 'problema_respiratorio', type: 'multiselect', texto: 'Você possui algum problema respiratório prévio? (Selecione todos que se aplicam)',
                    opcoes: ['Asma', 'Bronquite', 'Alergia respiratória', 'Sinusite crônica', 'Nenhum dos anteriores'],
                    pontuacao: {'Asma': 7, 'Bronquite': 7, 'Alergia respiratória': 4, 'Sinusite crônica': 4, 'Nenhum dos anteriores': 0},
                    proxima: 'procurou_medico'
                },
                { id: 'procurou_medico', texto: 'Você já procurou atendimento médico por sintomas que acredita estarem relacionados ao uso de cigarros eletrônicos?', opcoes: ['Sim, mais de uma vez', 'Sim, apenas uma vez', 'Não'], proxima: 'fim_calculo' },
                { id: 'pedir_ajuda', texto: 'Lembre-se: sua saúde é prioridade. Você gostaria de receber uma lista de indicações de hospitais ou postos de saúde na sua região?', opcoes: ['Sim, gostaria', 'Não, obrigado'], proxima: (resposta) => resposta === 'Sim, gostaria' ? 'escolher_cidade' : 'fim_agradecimento' },
                { id: 'escolher_cidade', texto: 'Em qual destas cidades você busca atendimento?', opcoes: ['Paulínia', 'Campinas', 'Sumaré', 'Hortolândia'], proxima: 'mostrar_hospitais' }
            ];

            function adicionarMensagem(texto, tipo, html = false) {
                const divMensagem = document.createElement('div');
                if (html) {
                    divMensagem.innerHTML = texto;
                } else {
                    divMensagem.textContent = texto;
                }
                divMensagem.style.padding = '10px 15px';
                divMensagem.style.borderRadius = '20px';
                divMensagem.style.maxWidth = '85%';
                divMensagem.style.wordWrap = 'break-word';
                divMensagem.style.lineHeight = '1.4';

                if (tipo === 'bot') {
                    divMensagem.style.backgroundColor = '#f1f0f0';
                    divMensagem.style.alignSelf = 'flex-start';
                } else {
                    divMensagem.style.backgroundColor = 'var(--azul)';
                    divMensagem.style.color = 'white';
                    divMensagem.style.alignSelf = 'flex-end';
                }
                chatContainer.appendChild(divMensagem);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            function mostrarResultadoFinal() {
                let mensagemFinal = '';

                if (pontuacaoRisco <= 10) {
                    mensagemFinal = "<strong>Resultado: RISCO BAIXO.</strong><br>Com base em suas respostas, os indicadores de risco são baixos. No entanto, é crucial lembrar que não existe nível seguro para o uso de vapes, especialmente para a saúde pulmonar a longo prazo.";
                } else if (pontuacaoRisco <= 25) {
                    mensagemFinal = "<strong>Resultado: RISCO MODERADO.</strong><br>ATENÇÃO: Suas respostas indicam fatores de risco que merecem atenção. Sintomas relatados e a frequência de uso são sinais de alerta. É altamente recomendável conversar com seus pais ou um profissional de saúde.";
                } else {
                    mensagemFinal = "<strong>Resultado: RISCO ALTO.</strong><br>ALERTA: Sua pontuação indica um risco elevado para complicações respiratórias. A combinação de fatores é um sinal sério. É fundamental e urgente que você procure avaliação de um médico.";
                }
                adicionarMensagem(mensagemFinal, 'bot', true);
                adicionarMensagem("⚠️ Lembre-se: este chatbot é uma ferramenta de conscientização e NÃO SUBSTITUI um diagnóstico médico.", 'bot');
                setTimeout(() => executarPasso('pedir_ajuda'), 1200);
            }

            function executarPasso(id) {
                if (!id) return;
                opcoesContainer.innerHTML = '';

                const passo = fluxoConversa.find(p => p.id === id);
                if (!passo) {
                    if (id === 'fim_positivo') {
                        adicionarMensagem('Que ótimo! Continuar sem experimentar é a decisão mais saudável para seus pulmões. Obrigado por participar!', 'bot');
                    } else if (id === 'fim_calculo') {
                        mostrarResultadoFinal();
                    } else if (id === 'mostrar_hospitais') {
                        const cidade = historicoRespostas['escolher_cidade'].toLowerCase();
                        const info = informacoesMedicas[cidade] || "Desculpe, não tenho informações detalhadas para esta localidade, mas procure a Unidade Básica de Saúde (UBS) mais próxima de sua casa.";
                        adicionarMensagem(info, 'bot', true);
                        setTimeout(() => executarPasso('fim_agradecimento'), 1200);
                    } else if (id === 'fim_agradecimento') {
                        adicionarMensagem("Obrigado por utilizar o podAI. Cuide-se!", 'bot');
                    }
                    return;
                }
                
                adicionarMensagem(passo.texto, 'bot');

                if (passo.type === 'multiselect') {
                    let selecionados = new Set();
                    passo.opcoes.forEach(opcaoTexto => {
                        const botao = document.createElement('button');
                        botao.textContent = opcaoTexto;
                        botao.className = 'btn secondary';
                        botao.style.transition = 'all 0.2s';
                        botao.onclick = () => {
                            if (selecionados.has(opcaoTexto)) {
                                selecionados.delete(opcaoTexto);
                                botao.style.backgroundColor = '';
                                botao.style.color = 'var(--texto)';
                            } else {
                                selecionados.add(opcaoTexto);
                                botao.style.backgroundColor = 'var(--azul-escuro)';
                                botao.style.color = 'white';
                            }
                        };
                        opcoesContainer.appendChild(botao);
                    });

                    const btnContinuar = document.createElement('button');
                    btnContinuar.textContent = 'Continuar →';
                    btnContinuar.className = 'btn primary';
                    btnContinuar.style.marginTop = '10px';
                    btnContinuar.onclick = () => {
                        let pontosMultiplos = 0;
                        selecionados.forEach(sel => {
                            if (passo.pontuacao && passo.pontuacao[sel]) {
                                pontosMultiplos += passo.pontuacao[sel];
                            }
                        });
                        const respostaFormatada = Array.from(selecionados).join(', ') || 'Nenhuma opção selecionada';
                        adicionarMensagem(respostaFormatada, 'usuario');
                        pontuacaoRisco += pontosMultiplos;
                        historicoRespostas[passo.id] = respostaFormatada;
                        setTimeout(() => executarPasso(passo.proxima), 500);
                    };
                    opcoesContainer.appendChild(btnContinuar);

                } else {
                    passo.opcoes.forEach(opcaoTexto => {
                        const botao = document.createElement('button');
                        botao.textContent = opcaoTexto;
                        botao.className = 'btn secondary';
                        botao.onclick = () => {
                            const pontos = (passo.pontuacao && passo.pontuacao[opcaoTexto]) ? passo.pontuacao[opcaoTexto] : 0;
                            adicionarMensagem(opcaoTexto, 'usuario');
                            pontuacaoRisco += pontos;
                            historicoRespostas[passo.id] = opcaoTexto;

                            let proximoId;
                            if (typeof passo.proxima === 'function') {
                                proximoId = passo.proxima(opcaoTexto);
                            } else {
                                proximoId = passo.proxima;
                            }
                            setTimeout(() => executarPasso(proximoId), 500);
                        };
                        opcoesContainer.appendChild(botao);
                    });
                }
            }

            executarPasso('inicio');
        </script>

    <?php } elseif($p === 'sobre') { ?>
        <div class="card">
            <div class="card" style="margin-top: 30px; padding: 30px;">
    <h2 style="color: #333; border-bottom: 2px solid #4018d4; padding-bottom: 10px;">Quem Desenvolveu?</h2>
    <p>Desenvolvido por dois Estudantes do Centro Municipal de Educação Profissional Osmar Passarelli Silveira, Instituição educacional em Paulínia, São Paulo.</p>

    <h2 style="margin-top: 25px; color: #333;">Quem somos nós?</h2>
    <h4 style="color: #555;">O projeto podAI foi idealizado e desenvolvido por Mirella Maria Rosa e Gabriel Nascimento de Oliveira.</h4>

    <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin: 30px 0;">
        
        <div style="text-align: center; width: 300p;">
            <div style="width: 150px; height: 180px; border-radius: 50%; overflow: hidden; margin: 0 auto 10px; border: 4px solid #3b96f7; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <img src= "img/mirella.jpg " style="width: 90%; height: 178%; object-fit: cover;">
            </div>
            <strong style="color: #333;">Mirella Maria Rosa</strong>
        </div>

        <div style="text-align: center; width: 300px;">
            <div style="width: 150px; height: 180px; border-radius: 50%; overflow: hidden; margin: 0 auto 10px; border: 4px solid #3b96f7; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <img src="img/gabriel.jpeg" alt="Gabriel Nascimento" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <strong style="color: #333;">Gabriel Nascimento</strong>
        </div>
    </div>

    <div style="line-height: 1.6; color: #444;">
        <p>Este trabalho foi criado como parte de um projeto de Iniciação Científica e serve como nosso Trabalho de Conclusão de Curso (TCC). Nosso objetivo é utilizar a tecnologia para gerar um impacto positivo na saúde pública, conscientizando adolescentes e jovens sobre os riscos respiratórios associados ao uso de cigarros eletrônicos.</p>

        <p>Acreditamos que a informação, aliada à inovação da Inteligência Artificial, pode ser uma ferramenta poderosa para a prevenção e o bem-estar da comunidade. Com este sistema de IA, buscamos oferecer um recurso simples e acessível para que todos possam entender melhor os sintomas de risco e tomar decisões mais seguras em relação à sua saúde.</p>
    </div>
</div>
        
    <?php } elseif(in_array($p, ['asma','bronquite','alergia','sinusite','evali'])) { ?>
        <div class="card">
            <h2><?= htmlspecialchars($titulos_doencas[$p]) ?></h2>
            <?php if($p === 'asma') { ?>
                <p><strong>Asma</strong> é uma das doenças respiratórias crônicas mais comuns. Ela afeta os pulmões e pode causar sintomas como falta de ar, chiado no peito, sensação de aperto e respiração rápida e curta.
Esses sintomas costumam piorar à noite ou nas primeiras horas da manhã, e também podem surgir após exercícios físicos, contato com poeira, poluição, alérgenos ou até mesmo com mudanças no clima.
A asma pode ser influenciada por diferentes fatores. Entre os ambientais, estão a exposição à poeira, ácaros, fungos, baratas, poluição e infecções virais (como resfriados). Já os fatores genéticos incluem histórico familiar de asma ou rinite e também a obesidade, que pode facilitar processos inflamatórios no organismo.
Apesar de não ter cura, a asma pode ser controlada com o tratamento adequado. No Brasil, o SUS oferece acompanhamento gratuito. O ideal é procurar uma Unidade Básica de Saúde (UBS), onde profissionais irão orientar sobre o uso de medicamentos, prevenção de crises e identificação dos sinais de agravamento.</p>
                <h2>Os sintomas da Asma consistem em:</h2>
                <ul>
                    <li>Tosse frequente, principalmente à noite ou ao acordar</li>
                    <li>Falta de ar, com sensação de dificuldade para respirar </li>
                    <li>Chiado no peito, semelhante a um “assobio” ao respirar </li>
                    <li>Sensação de aperto no tórax,que causa bastante desconforto</li>
                </ul>
                <img src=".png" alt="">
                <img src="img/estagiosDaAsma.jpg" alt="Logotipo do Site" style=width:110px; height: auto;>
                
                <p>A asma pode ser desencadeada por alérgenos dentre eles, a  fumaça dos vapes.</p>
            <?php } elseif($p === 'bronquite') { ?>
                <p><strong>Bronquite</strong> é uma doença respiratória caracterizada pela inflamação dos brônquios, que são os canais responsáveis por levar o ar até os pulmões.
Além de conduzir o ar, os brônquios também têm funções importantes como aquecer, umedecer e filtrar o ar, ajudando a proteger o sistema respiratório contra impurezas.
Quando ocorre a bronquite, esses canais ficam inflamados, dificultando a passagem do ar e causando desconforto na respiração.</p>
<h2>Dentre os sintomas da bronquite, encontram se: </h2>
                <ul>
                    <li>Tosse com ou sem muco</li>
                    <li>Fadiga</li>
                    <li>Dificuldade para respirar</li>
                </ul>
                    <img src="img/bronquite.jpg" alt="Logotipo do Site" style=width:110px; height: 110px;>
                   <br><br> <h2>O que acontece no organismo?</h2>
                    <p>Durante a bronquite, ocorre uma inflamação na mucosa dos brônquios e da traqueia. Isso faz com que a região fique inchada (edema) e com maior fluxo sanguíneo (vermelhidão/irritação).

Como consequência, há aumento da produção de muco e estreitamento das vias respiratórias, o que dificulta a passagem do ar e pode causar sintomas como tosse e sensação de peito carregado.</p>

                <p>O uso de cigarro eletrônico pode agravar quadros de bronquite, principalmente em adolescentes.</p>
              <?php } elseif($p === 'alergia') { ?>
                <p><strong>Alergia Respiratória</strong> é uma resposta exagerada do sistema imunológico a substâncias inaladas. Os sintomas comuns são:</p>
                <ul>
                    <li>Espirros</li>
                    <li>Coceira no nariz e olhos</li>
                    <li>Congestão nasal</li>
                </ul>
                <p>Alérgenos como poeira, mofo e o próprio vapor do cigarro eletrônico podem desencadear crises.</p>
            <?php } elseif($p === 'sinusite') { ?>
                <p><strong>Sinusite </strong>A sinusite é uma condição causada pela dificuldade de drenagem do muco produzido nas cavidades nasais e paranasais.

As cavidades paranasais — frontal, maxilar, etmoidal (entre os olhos) e esfenoidal (mais profunda no crânio) — são espaços que se conectam ao nariz por pequenos canais chamados óstios. Esses canais têm a função de permitir a circulação do ar e a drenagem da secreção nasal.

Quando esse processo funciona corretamente, o muco ajuda a manter o sistema respiratório protegido e saudável. <br>
<h2>Pode causar:</h2></p>
                <ul>
                    <li>Dor ou pressão facial</li>
                    <li>Congestão nasal persistente</li>
                    <li>Secreção espessa e amarelada</li>
                </ul>
                <img src="img/sinusite.jpg" alt="Imagem Sinusite" style=width:50px; height: auto;>
                <p>Fumaça e vapor de substâncias químicas são fatores de risco para piora da sinusite.</p>
            <?php } elseif($p === 'evali') { ?>
                <p>A <strong>EVALI</strong> é uma das doenças respiratórios mais importantes para o nosso trabalho, visto que ela é desencadeada exclusivamente pelo uso de cigarros eletrônicos. 
            A sigla EVALI (<i>E-cigarette or Vaping product use-Associated Lung Injury</i>) traduzida, trata-se de uma lesão pulmonar aguda associada ao uso de cigarros eletrônicos e produtos de vaporização.
        Por ser uma doença recente, não há certeaz de que é reversível, entretando, quando diagnosticado é importante que o paciente pare imediatamente de utilizar o cigarro eletrônicos. A EVALI em casos mais graves, pode resultar no óbito do paciente, porém em seu início, pode se apresentar nos seguintes sintomas: 
    </p>
                <ul>
                    <li>Tosse intensa</li>
                    <li>Dor no peito</li>
                    <li>Febre</li>
                    <li>Dificuldade respiratória severa</li>
                </ul>
                <p>Por isso a procura de um profissional é essencial caso observe-se qualquer um desses sintomas.</p>
                <br>

                <center><img src="img/evali.jpg" alt="Logotipo do Site" style=width:10px; height: auto;></center>
                <h2><center>Apenas cigarros eletrônicos causam EVALI?</center></h2>
                <p>A EVALI é considerada exclusiva do cigarro eletrônico porque está ligada à inalação de substâncias presentes nos líquidos dos vapes, que podem causar uma inflamação pulmonar diferente das doenças causadas pelo cigarro tradicional.</p>
                <p>Casos de EVALI podem exigir hospitalização e suporte respiratório.</p>
            <?php } ?>
        </div>

    <?php } else { ?>
        <div class="card">
            <h2>Página não encontrada</h2>
            <p>Desculpe, a página solicitada não existe.</p>
        </div>
    <?php } ?>
    
</section>

</main>
<footer class="container">
    &copy; 2026 Projeto Acadêmico — Todos os direitos reservados
</footer>
</body>
</html>