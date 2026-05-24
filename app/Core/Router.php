<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    private array $routes = [];

    public function add(string $path, array $handler, string $method = 'GET'): void
    {
        $this->routes[strtoupper($method)][trim($path, '/')] = $handler;
    }

    public function dispatch(string $path): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path = trim($path, '/');

        if (!isset($this->routes[$method][$path])) {
            Response::json([
                'error' => 'not found',
                'path' => $path,
            ], 404);
        }

        [$controller, $controllerMethod] = $this->routes[$method][$path];

        (new $controller())->$controllerMethod();
    }
}
