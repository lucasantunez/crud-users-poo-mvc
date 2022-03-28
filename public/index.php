<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\MainController;
use Controllers\UserController;
use Controllers\LoginController;

$router = new Router();

// User routes
$router->get('/users', [UserController::class, 'index']);
$router->get('/users/create', [UserController::class, 'create']);
$router->post('/users/create', [UserController::class, 'create']);
$router->get('/users/update', [UserController::class, 'update']);
$router->post('/users/update', [UserController::class, 'update']);
$router->post('/users/delete', [UserController::class, 'delete']);

// Index
$router->get('/', [MainController::class, 'index']);

// Login routes
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->checkRoutes();