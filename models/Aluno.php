
<?php

class Aluno
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(
        string $matricula,
        string $nome,
        string $dataNascimento,
        int $idResponsavel
    ): bool {
        $sql = "INSERT INTO aluno
                (matricula, nome, data_nascimento, id_responsavel)
                VALUES
                (:matricula, :nome, :data_nascimento, :id_responsavel)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':matricula', $matricula, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $dataNascimento, PDO::PARAM_STR);
        $stmt->bindValue(':id_responsavel', $idResponsavel, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
