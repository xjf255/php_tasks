<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void  { $this->add('GET', $path, $handler); }
    public function post(string $path, array $handler): void { $this->add('POST', $path, $handler); }

    private function add(string $method, string $path, array $handler): void
    {
        // /tasks/{id}/edit  ->  #^/tasks/(?P<id>[^/]+)/edit$#
        $regex = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $path);
        $this->routes[] = [$method, '#^' . $regex . '$#', $handler];
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = '/' . trim($uri, '/');

        foreach ($this->routes as [$routeMethod, $regex, [$class, $action]]) {
            if ($routeMethod === $method && preg_match($regex, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                (new $class())->$action(...array_values($params));
                return;
            }
        }

        http_response_code(404);
        echo '404 - Página no encontrada';
    }
}