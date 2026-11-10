
<?php

class Responsavel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(string $nome, string $telefone): int
    {
        $sql = "INSERT INTO responsavel (nome, telefone)
                VALUES (:nome, :telefone)
                RETURNING id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }
}
