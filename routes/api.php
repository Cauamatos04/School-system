
<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../controllers/ModalidadeController.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new ModalidadeController($pdo);

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = str_replace('/routes/api.php', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (in_array($metodo, ['POST', 'PUT', 'DELETE'], true)) {
    require_once __DIR__ . '/../middlewares/autenticacao.php';
}

// Ícones permitidos no sistema
$iconesPermitidos = [
    'futebol',
    'futsal',
    'basquete',
    'volei',
    'handebol',
    'natacao',
    'judo',
    'karate',
    'jiu-jitsu',
    'atletismo',
    'ciclismo',
    'tenis',
    'tenis-mesa',
    'ginastica',
    'danca',
    'outros'
];

if (preg_match('#^/modalidades/([1-9][0-9]*)$#', $caminho, $matches)) {
    $id = (int) $matches[1];
} elseif ($caminho === '/modalidades') {
    $id = null;
} else {
    http_response_code(404);
    echo json_encode(['erro' => 'Rota não encontrada'], JSON_UNESCAPED_UNICODE);
    exit;
}

$dados = [];

if (in_array($metodo, ['POST', 'PUT'], true)) {
    $conteudo = file_get_contents('php://input');
    $dados = json_decode($conteudo, true);

    if (!is_array($dados)) {
        http_response_code(400);
        echo json_encode(['erro' => 'JSON inválido'], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

try {

    switch ($metodo) {

        case 'GET':

            if ($id !== null) {
                $resultado = $controller->buscarPorId($id);

                if ($resultado === null) {
                    http_response_code(404);
                    $resultado = ['erro' => 'Modalidade não encontrada'];
                }
            } else {
                $resultado = $controller->listar();
            }

            break;

        case 'POST':

            $nome = trim($dados['nome'] ?? '');

            if ($nome === '') {
                http_response_code(400);
                $resultado = ['erro' => 'O nome da modalidade é obrigatório'];
                break;
            }

            $descricao = trim((string) ($dados['descricao'] ?? ''));

            $icone = $dados['icone'] ?? 'outros';

            if (!is_string($icone) || !in_array($icone, $iconesPermitidos, true)) {
                http_response_code(400);
                $resultado = ['erro' => 'Ícone da modalidade inválido'];
                break;
            }

            if ($controller->cadastrar($nome, $descricao, $icone)) {
                http_response_code(201);
                $resultado = ['mensagem' => 'Modalidade cadastrada com sucesso'];
            } else {
                http_response_code(500);
                $resultado = ['erro' => 'Não foi possível cadastrar a modalidade'];
            }

            break;

        case 'PUT':

            if ($id === null) {
                http_response_code(400);
                $resultado = ['erro' => 'Informe o ID da modalidade'];
                break;
            }

            $nome = trim($dados['nome'] ?? '');

            if ($nome === '') {
                http_response_code(400);
                $resultado = ['erro' => 'O nome da modalidade é obrigatório'];
                break;
            }

            $modalidadeExistente = $controller->buscarPorId($id);

            if ($modalidadeExistente === null) {
                http_response_code(404);
                $resultado = ['erro' => 'Modalidade não encontrada'];
                break;
            }

            $descricao = trim((string) ($dados['descricao'] ?? ''));

            // Se a requisição antiga não enviar ícone, mantém o atual.
            $icone = $dados['icone'] ?? ($modalidadeExistente['icone'] ?? 'outros');

            if (!is_string($icone) || !in_array($icone, $iconesPermitidos, true)) {
                http_response_code(400);
                $resultado = ['erro' => 'Ícone da modalidade inválido'];
                break;
            }

            if ($controller->editar($id, $nome, $descricao, $icone)) {
                $resultado = ['mensagem' => 'Modalidade atualizada com sucesso'];
            } else {
                http_response_code(500);
                $resultado = ['erro' => 'Não foi possível atualizar a modalidade'];
            }

            break;

        case 'DELETE':

            if ($id === null) {
                http_response_code(400);
                $resultado = ['erro' => 'Informe o ID da modalidade'];
                break;
            }

            $modalidadeExistente = $controller->buscarPorId($id);

            if ($modalidadeExistente === null) {
                http_response_code(404);
                $resultado = ['erro' => 'Modalidade não encontrada'];
                break;
            }

            if ($controller->excluir($id)) {
                $resultado = [
                    'mensagem' => 'Modalidade excluída com sucesso. As inscrições vinculadas também foram excluídas.'
                ];
            } else {
                http_response_code(500);
                $resultado = ['erro' => 'Não foi possível excluir a modalidade'];
            }

            break;

        default:

            header('Allow: GET, POST, PUT, DELETE');
            http_response_code(405);
            $resultado = ['erro' => 'Método não permitido'];

            break;
    }

} catch (PDOException $e) {

    if ($e->getCode() === '23000') {
        http_response_code(409);
        $resultado = ['erro' => 'Já existe uma modalidade com esse nome'];
    } else {
        http_response_code(500);
        $resultado = ['erro' => 'Erro interno ao acessar o banco de dados'];
    }

} catch (Throwable $e) {

    http_response_code(500);
    $resultado = ['erro' => 'Erro interno no servidor'];

}

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
