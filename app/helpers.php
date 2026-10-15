<?php
declare(strict_types=1);

function config(string $key, mixed $default = null): mixed
{
    static $config = null;
    $config ??= require BASE_PATH . '/config/config.php';
    return $config[$key] ?? $default;
}

/** Escapa HTML para evitar XSS. Úsalo en TODA salida dentro de las vistas. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}