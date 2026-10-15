<?php
use App\Controllers\TaskController;

/** @var App\Core\Router $router */
$router->get('/',                   [TaskController::class, 'index']);
$router->get('/tasks',              [TaskController::class, 'index']);
$router->get('/tasks/{id}/edit',    [TaskController::class, 'edit']);