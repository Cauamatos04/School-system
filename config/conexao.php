<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

try {

    $env = function (string $key): string {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null || $value === '') {
            throw new RuntimeException(
                "Variável de ambiente ausente: {$key}"
            );
        }

        return (string) $value;
    };

    $host = $env('DB_HOST');
    $port = $env('DB_PORT');
    $database = $env('DB_NAME');
    $user = $env('DB_USER');
    $password = $env('DB_PASS');

    $pdo = new PDO(
        "pgsql:host={$host};port={$port};dbname={$database};sslmode=require",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (Throwable $e) {

    error_log('Erro na conexão com o banco de dados: ' . $e->getMessage());

    http_response_code(500);

    die("Erro ao conectar ao banco de dados.");
}
