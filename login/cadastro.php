
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script> <!--Essas duas linhas servem para máscarar o input na parte de cadastro tanto de cpf qunato de telefone.-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>podAI - Cadastro</title>

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
    background:var(--cinza);
    font-family:Arial, Helvetica, sans-serif;
}

.topbar{
    background:var(--azul);
    color:white;
    text-align:center;
    padding:10px;
    font-weight:bold;
}

header{
    background:var(--azul-escuro);
    color:white;
    text-align:center;
    padding:20px;
}

.container{
    max-width:900px;
    margin:30px auto;
    padding:20px;
}

.card{
    background:white;
    border-radius:12px;
    padding:30px;
    box-shadow:0 2px 12px rgba(0,0,0,.1);
}

.card h2{
    color:var(--azul);
    margin-bottom:25px;
}

.linha{
    display:flex;
    gap:20px;
}

.grupo{
    flex:1;
    margin-bottom:18px;
}

.grupo label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
}

.grupo input,
.grupo select{
    width:100%;
    padding:12px;
    border:1px solid var(--borda);
    border-radius:8px;
}

.btn{
    background:var(--azul);
    color:white;
    border:none;
    padding:14px;
    width:100%;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
    font-weight:bold;
}

.btn:hover{
    background:var(--azul-escuro);
}

.voltar{
    display:inline-block;
    margin-bottom:20px;
    text-decoration:none;
    color:var(--azul);
    font-weight:bold;
}

@media(max-width:768px){

    .linha{
        flex-direction:column;
        gap:0;
    }

}

</style>
</head>

<body>
    <script>
  $(document.body).ready(function(){
    // Máscara para CPF
    $('#cpf').inputmask('999.999.999-99');

    // Máscara inteligente para Telefone/Celular (aceita 8 ou 9 dígitos)
    $('#telefone').inputmask({
      mask: ['(99) 9999-9999', '(99) 99999-9999'],
      keepStatic: true
    });
  });
</script>

<div class="topbar">
    Portal podAI
</div>

<header>
    <h1>Cadastro de Usuário</h1>
    <p>Sistema Inteligente de Monitoramento Respiratório</p>
</header>

<div class="container">

<a href="login.php" class="voltar">
← Voltar ao Login
</a>

<div class="card">

<h2>Novo Cadastro</h2>

<form action="salvar_usuario.php" method="POST">

<div class="linha">

<div class="grupo">
<label for= "cpf" >CPF</label>
<input type="text" name="cpf" id="cpf" required placeholder="000.000.000-00">
</div>

<div class="grupo">
<label>Nome Completo</label>
<input type="text" name="nome" required>
</div>

</div>

<div class="linha">

<div class="grupo">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="grupo">
<label for="telefone">Telefone</label>
<input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000">
</div>

</div>

<div class="linha">

<div class="grupo">
<label>Data de Nascimento</label>
<input type="date" name="data_nascimento" required>
</div>

<div class="grupo">
<label>Cidade</label>
<input type="text" name="cidade" required>
</div>

</div>

<div class="linha">

<div class="grupo">
<label>Estado</label>
<select name="estado" required>
<option value="">Selecione</option>
<option>SP</option>
<option>MG</option>
<option>RJ</option>
<option>PR</option>
<option>SC</option>
<option>RS</option>
</select>
</div>

<div class="grupo">
<label>Tipo de Usuário</label>
<select name="tipo_usuario" required>
<option value="">Selecione</option>
<option value="paciente">Paciente</option>
<option value="profissional">Profissional</option>
</select>
</div>

</div>

<div class="linha">

<div class="grupo">
<label>Senha</label>
<input type="password" name="senha" required>
</div>

<div class="grupo">
<label>Confirmar Senha</label>
<input type="password" name="confirmar_senha" required>
</div>

</div>

<button type="submit" class="btn">
Finalizar Cadastro
</button>

</form>

</div>

</div>

</body>
</html>

