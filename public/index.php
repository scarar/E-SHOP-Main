<?php
require_once __DIR__ . '/../app/core/bootstrap.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\ProductController;

// Initialize session with secure settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);
session_start();

// Set error reporting in development
if (getenv('APP_ENV') === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Basic routing
$router = new Router();

// Auth routes
$router->add('GET', '/auth/login', [AuthController::class, 'login']);
$router->add('POST', '/auth/login', [AuthController::class, 'login']);
$router->add('GET', '/auth/register', [AuthController::class, 'register']);
$router->add('POST', '/auth/register', [AuthController::class, 'register']);
$router->add('GET', '/auth/logout', [AuthController::class, 'logout']);
$router->add('GET', '/auth/2fa', [AuthController::class, 'twoFactorAuth']);
$router->add('POST', '/auth/2fa', [AuthController::class, 'twoFactorAuth']);

// Product routes
$router->add('GET', '/', [ProductController::class, 'index']);
$router->add('GET', '/products', [ProductController::class, 'index']);
$router->add('GET', '/products/show/{id}', [ProductController::class, 'show']);
$router->add('GET', '/products/create', [ProductController::class, 'create']);
$router->add('POST', '/products/create', [ProductController::class, 'create']);
$router->add('GET', '/products/edit/{id}', [ProductController::class, 'edit']);
$router->add('POST', '/products/edit/{id}', [ProductController::class, 'edit']);
$router->add('POST', '/products/delete/{id}', [ProductController::class, 'delete']);

try {
    $router->dispatch();
} catch (Exception $e) {
    if (getenv('APP_ENV') === 'development') {
        throw $e;
    }
    
    http_response_code(500);
    require __DIR__ . '/../app/views/errors/500.php';
}