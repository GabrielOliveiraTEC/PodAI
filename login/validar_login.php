<?php
session_start();
require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if($usuario){
    // Verifica se a senha está correta usando o hash seguro
    if(password_verify($senha, $usuario['senha'])){
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo_usuario']; // Salva se é 'paciente' ou 'profissional'

        // Redirecionamento baseado no tipo de usuário
        if($_SESSION['tipo'] == 'profissional') {
            header("Location: index.php");
        } else {
            header("Location: index.php"); 
        }
        exit;
    }
}

// Se der erro de login
header("Location: login.php?erro=1");
exit;
?>