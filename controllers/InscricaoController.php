
<?php

require_once __DIR__ . '/../models/Inscricao.php';
require_once __DIR__ . '/../models/Responsavel.php';
require_once __DIR__ . '/../models/Aluno.php';

class InscricaoController
{
    private PDO $pdo;
    private Inscricao $inscricao;
    private Responsavel $responsavel;
    private Aluno $aluno;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->inscricao = new Inscricao($pdo);
        $this->responsavel = new Responsavel($pdo);
        $this->aluno = new Aluno($pdo);
    }

    public function cadastrar(
        string $matricula,
        string $nomeAluno,
        string $dataNascimento,
        string $nomeResponsavel,
        string $telefone,
        int $idModalidade
    ): bool {
        try {
            $this->pdo->beginTransaction();

            $idResponsavel = $this->responsavel->inserir(
                $nomeResponsavel,
                $telefone
            );

            $this->aluno->inserir(
                $matricula,
                $nomeAluno,
                $dataNascimento,
                $idResponsavel
            );

            $this->inscricao->inserir(
                $matricula,
                $idModalidade
            );

            $this->pdo->commit();

            return true;

        } catch (Throwable $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }

            throw $e;
        }
    }

    public function listar(): array
    {
        return $this->inscricao->listar();
    }

    public function buscarPorId(int $id): ?array
    {
        return $this->inscricao->buscarPorId($id);
    }

    public function atualizarStatus(int $id, string $status): bool
    {
        return $this->inscricao->atualizarStatus($id, $status);
    }


    public function listarAprovadosPorModalidade(int $idModalidade): array{
        return $this->inscricao->listarAprovadosPorModalidade($idModalidade);
    }


    public function excluir(int $id): bool{
        return $this->inscricao->excluir($id);
    }
}
