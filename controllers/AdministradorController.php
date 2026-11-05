<?php

require_once __DIR__ . '/../models/Administrador.php';

class AdministradorController
{
    private Administrador $administrador;

    public function __construct(PDO $pdo)
    {
        $this->administrador = new Administrador($pdo);
    }

    public function login(string $usuario, string $senha): ?array
    {
        return $this->administrador->autenticar($usuario, $senha);
    }
}