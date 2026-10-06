<?php
// Inicializa a sessão para que o PHP saiba qual usuário quer deslogar
session_start();

// Limpa todas as variáveis salvas na sessão (como o ID e nome do usuário)
$_SESSION = array();

// Destrói a sessão completamente do servidor
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Manda o usuário imediatamente de volta para a página de login
header("Location: login.php");
exit;
?>