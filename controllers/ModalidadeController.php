<?php

require_once __DIR__ . '/../models/Modalidade.php';
require_once __DIR__ . '/../config/conexao.php';

class ModalidadeController {

    private Modalidade $modalidade;

    public function __construct(PDO $pdo) {
        $this->modalidade = new Modalidade($pdo);
    }

    public function listar(): array {
        return $this->modalidade->listar();
    }
    public function buscarPorId(int $id): ?array {
        return $this->modalidade->buscarPorId($id);
    }

    public function cadastrar(string $nome, string $descricao): bool {
        return $this->modalidade->cadastrar($nome, $descricao);
    }

    public function editar(int $id, string $nome, string $descricao): bool {
        return $this->modalidade->editar($id, $nome, $descricao);
    }

    public function excluir(int $id): bool {
        return $this->modalidade->excluir($id);
    }

}