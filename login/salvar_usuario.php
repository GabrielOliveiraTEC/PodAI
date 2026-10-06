<?php

require_once 'conexao.php';

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$data_nascimento = $_POST['data_nascimento'];
$tipo_usuario = $_POST['tipo_usuario'];

$senha = password_hash(
    $_POST['senha'],
    PASSWORD_DEFAULT
);

$sql = "INSERT INTO usuarios
(
cpf,
nome,
email,
senha,
telefone,
cidade,
estado,
data_nascimento,
tipo_usuario
)

VALUES
(
?,?,?,?,?,?,?,?,?
)";

$stmt = $conn->prepare($sql);

$stmt->execute([
    $cpf,
    $nome,
    $email,
    $senha,
    $telefone,
    $cidade,
    $estado,
    $data_nascimento,
    $tipo_usuario
]);

header("Location: login.php?cadastro=ok");
exit;