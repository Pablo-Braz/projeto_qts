<?php
function redirecionar($url, $dados = []) {
    // Garante que a sessão está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Salva os dados na sessão
    foreach ($dados as $chave => $valor) {
        $_SESSION[$chave] = $valor;
    }

    // Realiza o redirecionamento
    header("Location: $url");
    exit; // Encerra o script após o redirecionamento
}
?>