<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);

    echo json_encode(
        ['erro' => 'Método não permitido'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Remove os dados armazenados na sessão.
$_SESSION = [];

// Invalida o cookie da sessão no navegador.
if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();

    setcookie(session_name(), '', [
        'expires' => time() - 42000,
        'path' => $parametros['path'],
        'domain' => $parametros['domain'],
        'secure' => $parametros['secure'],
        'httponly' => $parametros['httponly'],
        'samesite' => $parametros['samesite'] ?? 'Lax'
    ]);
}

// Destrói a sessão no servidor.
session_destroy();

echo json_encode(
    ['mensagem' => 'Sessão encerrada com sucesso'],
    JSON_UNESCAPED_UNICODE
);
