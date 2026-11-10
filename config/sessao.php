
<?php

require_once __DIR__ . '/conexao.php';

class SessaoPostgreSQL implements SessionHandlerInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read(string $id): string|false
    {
        $sql = "
            SELECT dados
            FROM sessoes_php
            WHERE id = :id
              AND expira_em > NOW()
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $sessao = $stmt->fetch(PDO::FETCH_ASSOC);

        return $sessao ? $sessao['dados'] : '';
    }

    public function write(string $id, string $data): bool
    {
        $expiracao = date(
            'Y-m-d H:i:sP',
            time() + (int) ini_get('session.gc_maxlifetime')
        );

        $sql = "
            INSERT INTO sessoes_php (id, dados, expira_em)
            VALUES (:id, :dados, :expira_em)
            ON CONFLICT (id)
            DO UPDATE SET
                dados = EXCLUDED.dados,
                expira_em = EXCLUDED.expira_em
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'dados' => $data,
            'expira_em' => $expiracao
        ]);
    }

    public function destroy(string $id): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM sessoes_php WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }

    public function gc(int $max_lifetime): int|false
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM sessoes_php WHERE expira_em <= NOW()"
        );

        return $stmt->execute() ? $stmt->rowCount() : false;
    }
}

$handler = new SessaoPostgreSQL($pdo);

session_set_save_handler($handler, true);

ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Lax');

session_start();
