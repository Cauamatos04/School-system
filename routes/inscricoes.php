<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../controllers/InscricaoController.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new InscricaoController($pdo);

$metodo = $_SERVER['REQUEST_METHOD'];

$caminho = str_replace(
    '/routes/inscricoes.php',
    '',
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if (in_array($metodo, ['GET', 'PUT', 'DELETE'], true)) {
    require_once __DIR__ . '/../middlewares/autenticacao.php';
}

if ($caminho === '/inscricoes' ||
    preg_match('#^/inscricoes/\d+$#', $caminho) ||
    preg_match('#^/\d+$#', $caminho) ||
    preg_match('#^/modalidade/\d+/aprovados$#', $caminho)) {

if ($metodo === 'GET') {

    // Listar alunos aprovados de uma modalidade específica

    if (preg_match('#^/modalidade/(\d+)/aprovados$#', $caminho, $matches)) {

        $idModalidade = (int) $matches[1];

        try {
            $resultado = $controller->listarAprovadosPorModalidade($idModalidade);

            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

        } catch (Throwable $e) {
            http_response_code(500);

            echo json_encode(
                ['erro' => 'Erro ao listar alunos aprovados'],
                JSON_UNESCAPED_UNICODE
            );
        }

        exit;
    }

    // Listar todas as inscrições

    try {
        $resultado = $controller->listar();

        echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

    } catch (Throwable $e) {
        http_response_code(500);

        echo json_encode(
            ['erro' => 'Erro ao listar inscrições'],
            JSON_UNESCAPED_UNICODE
        );
    }

    exit;
}

    if ($metodo === 'POST') {
        $conteudo = file_get_contents('php://input');
        $dados = json_decode($conteudo, true);

        if (!is_array($dados)) {
            http_response_code(400);

            echo json_encode(
                ['erro' => 'JSON inválido'],
                JSON_UNESCAPED_UNICODE
            );

            exit;
        }

        $campos = [
            'matricula',
            'nome_aluno',
            'data_nascimento',
            'nome_responsavel',
            'telefone',
            'id_modalidade'
        ];

        foreach ($campos as $campo) {
            if (!isset($dados[$campo]) || $dados[$campo] === '') {
                http_response_code(400);

                echo json_encode(
                    ['erro' => "O campo {$campo} é obrigatório"],
                    JSON_UNESCAPED_UNICODE
                );

                exit;
            }
        }
        // Validar data de nascimento
$dataNascimento = $dados['data_nascimento'];

if (
    !is_string($dataNascimento) ||
    !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dataNascimento)
) {
    http_response_code(400);

    echo json_encode(
        ['erro' => 'Data de nascimento inválida'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

$data = DateTimeImmutable::createFromFormat('!Y-m-d', $dataNascimento);
$errosData = DateTimeImmutable::getLastErrors();

if (
    !$data ||
    ($errosData !== false && (
        $errosData['warning_count'] > 0 ||
        $errosData['error_count'] > 0
    )) ||
    $data->format('Y-m-d') !== $dataNascimento
) {
    http_response_code(400);

    echo json_encode(
        ['erro' => 'Data de nascimento inválida'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

// Calcular idade considerando o horário de Campina Grande
$hoje = new DateTimeImmutable(
    'today',
    new DateTimeZone('America/Fortaleza')
);

$idadeMinima = $hoje->modify('-6 years');
$idadeMaxima = $hoje->modify('-18 years');

if ($data > $idadeMinima || $data <= $idadeMaxima) {
    http_response_code(400);

    echo json_encode(
        ['erro' => 'O aluno deve ter entre 6 e 17 anos'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

        if (
            !filter_var($dados['id_modalidade'], FILTER_VALIDATE_INT) ||
            (int) $dados['id_modalidade'] <= 0
        ) {
            http_response_code(400);

            echo json_encode(
                ['erro' => 'ID da modalidade inválido'],
                JSON_UNESCAPED_UNICODE
            );

            exit;
        }

        try {
            $resultado = $controller->cadastrar(
                trim($dados['matricula']),
                trim($dados['nome_aluno']),
                $dados['data_nascimento'],
                trim($dados['nome_responsavel']),
                trim($dados['telefone']),
                (int) $dados['id_modalidade']
            );

            if ($resultado) {
                http_response_code(201);

                $resposta = [
                    'mensagem' => 'Inscrição realizada com sucesso'
                ];
            }

        } catch (PDOException $e) {
                if ($e->getCode() === '23505') {
        http_response_code(409);

        $resposta = [
            'erro' => 'Matrícula já cadastrada'
        ];
    } else {
        http_response_code(500);

        $resposta = [
            'erro' => 'Erro ao realizar inscrição'
        ];
    }

        } catch (Throwable $e) {
            http_response_code(500);

            $resposta = [
                'erro' => 'Erro interno ao realizar inscrição'
            ];
        }

        echo json_encode($resposta, JSON_UNESCAPED_UNICODE);

        exit;
    }

    if ($metodo === 'PUT') {
        $id = filter_var(
            basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)),
            FILTER_VALIDATE_INT
        );

        if (!$id) {
            http_response_code(400);

            echo json_encode(
                ['erro' => 'ID da inscrição inválido'],
                JSON_UNESCAPED_UNICODE
            );

            exit;
        }

        $conteudo = file_get_contents('php://input');
        $dados = json_decode($conteudo, true);

        if (
            !is_array($dados) ||
            !isset($dados['status']) ||
            $dados['status'] !== 'aprovada'
        ) {
            http_response_code(400);

            echo json_encode(
                ['erro' => 'Status inválido'],
                JSON_UNESCAPED_UNICODE
            );

            exit;
        }

        try {
            $resultado = $controller->atualizarStatus($id, 'aprovada');

            if ($resultado) {
                echo json_encode(
                    ['mensagem' => 'Inscrição aprovada com sucesso'],
                    JSON_UNESCAPED_UNICODE
                );
            } else {
                http_response_code(404);

                echo json_encode(
                    ['erro' => 'Inscrição não encontrada'],
                    JSON_UNESCAPED_UNICODE
                );
            }

        } catch (Throwable $e) {
            http_response_code(500);

            echo json_encode(
                ['erro' => 'Erro ao aprovar inscrição'],
                JSON_UNESCAPED_UNICODE
            );
        }

        exit;
    }


    header('Allow: GET, POST, PUT');

    http_response_code(405);

    echo json_encode(
        ['erro' => 'Método não permitido'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

http_response_code(404);

echo json_encode(
    ['erro' => 'Rota não encontrada'],
    JSON_UNESCAPED_UNICODE
);
