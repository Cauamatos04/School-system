<?php

class Modalidade{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function listar(): array{
        $sql = "SELECT * FROM modalidade ORDER BY nome";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): ?array
    {
        $sql = "SELECT * FROM modalidade WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function cadastrar(string $nome, string $descricao): bool{
        $sql = "INSERT INTO modalidade (nome, descricao) VALUES (:nome, :descricao)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':descricao', $descricao);

        return $stmt->execute();
    }

    public function editar(int $id, string $nome, string $descricao): bool{
        $sql = "UPDATE modalidade SET nome = :nome, descricao = :descricao WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':descricao', $descricao);

        return $stmt->execute();
    }

    public function excluir(int $id): bool{
        $sql = "DELETE FROM modalidade WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}