<?php
declare(strict_types=1);

session_start();

define('BASE_PATH', dirname(__DIR__));

// Convierte App\Core\Router en app/Core/Router.php y lo carga solo
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }
    $file = BASE_PATH . '/app/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

require BASE_PATH . '/app/helpers.php';
use App\Core\Router;

$router = new Router();
require BASE_PATH . '/config/routes.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));