
<?php

class Inscricao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(
        string $matriculaAluno,
        int $idModalidade
    ): bool {
        $sql = "INSERT INTO inscricao (matricula_aluno, id_modalidade)
                VALUES (:matricula_aluno, :id_modalidade)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':matricula_aluno', $matriculaAluno, PDO::PARAM_STR);
        $stmt->bindValue(':id_modalidade', $idModalidade, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function listar(): array
    {
        $sql = "SELECT
                    i.id,
                    i.matricula_aluno,
                    a.nome AS nome_aluno,
                    a.data_nascimento,
                    r.nome AS nome_responsavel,
                    r.telefone,
                    m.id AS id_modalidade,
                    m.nome AS nome_modalidade,
                    i.status,
                    i.criada_em
                FROM inscricao i
                INNER JOIN aluno a
                    ON i.matricula_aluno = a.matricula
                INNER JOIN responsavel r
                    ON a.id_responsavel = r.id
                INNER JOIN modalidade m
                    ON i.id_modalidade = m.id
                ORDER BY i.criada_em DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): ?array
    {
        $sql = "SELECT
                    i.id,
                    i.matricula_aluno,
                    a.nome AS nome_aluno,
                    a.data_nascimento,
                    r.nome AS nome_responsavel,
                    r.telefone,
                    m.id AS id_modalidade,
                    m.nome AS nome_modalidade,
                    i.status,
                    i.criada_em
                FROM inscricao i
                INNER JOIN aluno a
                    ON i.matricula_aluno = a.matricula
                INNER JOIN responsavel r
                    ON a.id_responsavel = r.id
                INNER JOIN modalidade m
                    ON i.id_modalidade = m.id
                WHERE i.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado !== false ? $resultado : null;
    }

    public function atualizarStatus(int $id, string $status): bool
    {
        if (!in_array($status, ['pendente', 'aprovada'], true)) {
            return false;
        }

        $sql = "UPDATE inscricao
                SET status = :status
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function excluir(int $id): bool
    {
        $sql = "DELETE FROM inscricao WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function listarAprovadosPorModalidade(int $idModalidade): array{
        $sql = "SELECT
                    i.id,
                    a.matricula,
                    a.nome AS nome_aluno,
                    a.data_nascimento,
                    r.nome AS nome_responsavel,
                    r.telefone,
                    m.nome AS nome_modalidade,
                    i.status,
                    i.criada_em
                FROM inscricao i
                INNER JOIN aluno a
                    ON i.matricula_aluno = a.matricula
                INNER JOIN responsavel r
                    ON a.id_responsavel = r.id
                INNER JOIN modalidade m
                    ON i.id_modalidade = m.id
                WHERE i.id_modalidade = :id_modalidade
                AND i.status = 'aprovada'
                ORDER BY a.nome";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_modalidade', $idModalidade, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
