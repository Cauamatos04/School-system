<?php

require_once __DIR__ . '/../config/sessao.php';

if (!isset($_SESSION['administrador_id'])) {
    http_response_code(401);

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode(
        ['erro' => 'Acesso não autorizado. Faça login para continuar.'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}
