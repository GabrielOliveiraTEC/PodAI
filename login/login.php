<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>podAI - Login</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

:root{
    --azul:#123b7a;
    --azul-escuro:#0f2f61;
    --amarelo:#ffcc33;
    --amarelo-hover:#e6b800;
    --cinza:#f8fafc;
    --borda:#cbd5e1;
    --texto:#1e293b;
    --texto-suave:#64748b;
    --sombra: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    background:var(--cinza);
    color: var(--texto);
    min-height:100vh;
    display: flex;
    flex-direction: column;
}

.topbar{
    background:var(--azul-escuro);
    color:white;
    padding:10px;
    text-align:center;
    font-weight:600;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

header {
    background: linear-gradient(135deg, var(--azul) 0%, var(--azul-escuro) 100%);
    color: white;
    padding: 55px 20px 65px;
    text-align: center;
}

header h1 {
    font-size: 3.5rem;
    font-weight: 900;
    letter-spacing: -1.5px;
    margin-bottom: 6px;
    line-height: 1;
}

header h1 span {
    color: var(--amarelo);
}

header p {
    font-size: 1.1rem;
    font-weight: 500;
    color: #cbd5e1;
    letter-spacing: 0.5px;
}

.container{
    width:100%;
    max-width:1000px;
    margin: -30px auto 40px;
    padding:0 20px;
    flex: 1;
}

.cards{
    display:flex;
    gap:30px;
    justify-content:center;
    align-items: stretch;
    flex-wrap:wrap;
}

.card{
    background:white;
    width:420px;
    border-radius:16px;
    padding:36px;
    box-shadow: var(--sombra);
    border: 1px solid #e2e8f0;
    display: flex;
    flex-direction: column;
}

.card h2{
    color:var(--azul);
    margin-bottom:20px;
    font-size: 1.5rem;
    font-weight: 700;
}

.card p {
    color: var(--texto-suave);
    line-height: 1.6;
}

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    font-size: 0.875rem;
    color: var(--texto);
}

.form-group input{
    width:100%;
    padding:12px 14px;
    border:1px solid var(--borda);
    border-radius:8px;
    font-family: inherit;
    font-size: 0.95rem;
    background-color: #fff;
    transition: all 0.2s ease;
    outline: none;
}

.form-group input:focus {
    border-color: var(--azul);
    box-shadow: 0 0 0 3px rgba(18, 59, 122, 0.15);
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:0.95rem;
    font-weight:600;
    transition: background 0.2s, transform 0.1s;
}

.btn:active {
    transform: scale(0.99);
}

.btn-primary{
    background:var(--azul);
    color:white;
}

.btn-primary:hover{
    background:var(--azul-escuro);
}

.btn-secondary{
    background:var(--amarelo);
    color:#1e1e1e;
}

.btn-secondary:hover{
    background:var(--amarelo-hover);
}

.separador{
    margin:20px 0;
    text-align:center;
    color: var(--texto-suave);
    font-size: 0.875rem;
    display: flex;
    align-items: center;
}

.separador::before,
.separador::after {
    content: "";
    flex: 1;
    border-bottom: 1px solid var(--borda);
}

.separador::before {
    margin-right: 12px;
}

.separador::after {
    margin-left: 12px;
}

footer{
    text-align:center;
    padding:24px 20px;
    color: var(--texto-suave);
    font-size: 0.875rem;
    border-top: 1px solid #e2e8f0;
    background: white;
}

@media(max-width:900px){
    .cards{
        flex-direction:column;
        align-items:center;
    }
    
    .card {
        width: 100%;
        max-width: 420px;
    }
    
    .container {
        margin-top: -20px;
    }
    
    header h1 {
        font-size: 2.8rem;
    }
}

</style>
</head>

<body>

<header>
    <h1>pod<span>AI</span></h1>
    <p>Sistema Inteligente de Acompanhamento Respiratório</p>
</header>

<div class="container">

    <div class="cards">

        <!-- LOGIN -->
        <div class="card">

            <h2>Entrar</h2>

            <form action="validar_login.php" method="POST">

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>

                <button class="btn btn-primary" type="submit">
                    Entrar
                </button>

            </form>

            <div class="separador">
                ou
            </div>

            <a href="cadastro.php">
                <button class="btn btn-secondary">
                    Criar Conta
                </button>
            </a>

        </div>

        <div class="card">

            <h2>Profissional da Saúde</h2>

            <p style="margin-bottom:20px;">
                Área exclusiva para médicos, enfermeiros e profissionais responsáveis pelo acompanhamento dos pacientes.
            </p>

            <a href="login_profissional.php">
                <button class="btn btn-primary">
                    Acessar Painel Profissional
                </button>
            </a>

        </div>

    </div>

</div>

<footer>
    © 2026 podAI - Todos os direitos reservados
</footer>

</body>
</html>