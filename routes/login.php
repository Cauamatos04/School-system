
<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../controllers/AdministradorController.php';

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

$conteudo = file_get_contents('php://input');
$dados = json_decode($conteudo, true);

if (
    !is_array($dados) ||
    !isset($dados['usuario'], $dados['senha']) ||
    !is_string($dados['usuario']) ||
    !is_string($dados['senha']) ||
    trim($dados['usuario']) === '' ||
    $dados['senha'] === ''
) {
    http_response_code(400);

    echo json_encode(
        ['erro' => 'Informe usuário e senha'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

$controller = new AdministradorController($pdo);

try {
    $administrador = $controller->login(
        trim($dados['usuario']),
        $dados['senha']
    );

    if (!$administrador) {
        http_response_code(401);

        echo json_encode(
            ['erro' => 'Usuário ou senha incorretos'],
            JSON_UNESCAPED_UNICODE
        );

        exit;
    }

    session_start();

    session_regenerate_id(true);

    $_SESSION['administrador_id'] = $administrador['id'];
    $_SESSION['administrador_usuario'] = $administrador['usuario'];

    echo json_encode(
        [
            'mensagem' => 'Login realizado com sucesso',
            'administrador' => [
                'id' => $administrador['id'],
                'usuario' => $administrador['usuario']
            ]
        ],
        JSON_UNESCAPED_UNICODE
    );

} catch (Throwable $e) {
    http_response_code(500);

    echo json_encode(
        ['erro' => 'Erro ao realizar login'],
        JSON_UNESCAPED_UNICODE
    );
}
