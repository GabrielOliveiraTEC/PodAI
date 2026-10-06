<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>podAI - Login Profissional</title>
    <style>
        :root{
            --azul:#123b7a;
            --azul-escuro:#0f2f61;
            --amarelo:#ffcc33;
            --cinza:#f5f6f8;
            --borda:#d9dde5;
        }
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
            background:var(--cinza);
            min-height:100vh;
        }
        .topbar{
            background:var(--azul);
            color:white;
            padding:12px;
            text-align:center;
            font-weight:bold;
        }
        header{
            background:var(--azul-escuro);
            color:white;
            padding:20px;
            text-align:center;
        }
        .container{
            width:100%;
            max-width:450px;
            margin:40px auto;
            padding:0 20px;
        }
        .card{
            background:white;
            border:1px solid var(--borda);
            border-radius:8px;
            padding:30px;
            box-shadow:0 4px 6px rgba(0,0,0,0.05);
        }
        h2{
            color:var(--azul-escuro);
            margin-bottom:20px;
            font-size:24px;
            text-align:center;
        }
        .form-group{
            margin-bottom:15px;
        }
        label{
            display:block;
            margin-bottom:5px;
            color:#444;
            font-weight:bold;
            font-size:14px;
        }
        input{
            width:100%;
            padding:10px;
            border:1px solid var(--borda);
            border-radius:4px;
            font-size:16px;
        }
        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:4px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            margin-top:10px;
        }
        .btn-primary{
            background:var(--azul);
            color:white;
        }
        .btn-primary:hover{
            background:var(--azul-escuro);
        }
        .erro-msg {
            color: #dc3545;
            background: #f8d7da;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }
        .voltar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: var(--azul);
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="topbar">PROJETO ACADÊMICO — podAI</div>

<header>
    <h1>podAI</h1>
</header>

<div class="container">
    <div class="card">
        <h2>Painel do Profissional</h2>

        <?php if(isset($_GET['erro'])): ?>
            <div class="erro-msg">Email ou senha incorretos!</div>
        <?php endif; ?>

        <form action="validar_login.php" method="POST">
            <div class="form-group">
                <label>E-mail Profissional</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" required>
            </div>

            <button class="btn btn-primary" type="submit">
                Entrar no Sistema
            </button>
        </form>

        <a href="login.php" class="voltar">⬅️ Voltar para seleção de login</a>
    </div>
</div>

</body>
</html> 