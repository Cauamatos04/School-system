<?php

class Administrador
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorUsuario(string $usuario): ?array
    {
        $sql = "SELECT id, usuario, senha_hash
                FROM administrador
                WHERE usuario = :usuario";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado !== false ? $resultado : null;
    }

    public function autenticar(string $usuario, string $senha): ?array
    {
        $administrador = $this->buscarPorUsuario($usuario);

        if (!$administrador) {
            return null;
        }

        if (!password_verify($senha, $administrador['senha_hash'])) {
            return null;
        }

        return [
            'id' => $administrador['id'],
            'usuario' => $administrador['usuario']
        ];
    }
}