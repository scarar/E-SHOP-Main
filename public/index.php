<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Error handling
error_reporting(E_ALL);
ini_set('display_errors', $_ENV['APP_DEBUG'] ? '1' : '0');

// Set default timezone
date_default_timezone_set('UTC');

// Start session
session_start();

// Basic routing
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => ['App\Controllers\HomeController', 'index'],
    '/login' => ['App\Controllers\AuthController', 'login'],
    '/register' => ['App\Controllers\AuthController', 'register'],
    '/products' => ['App\Controllers\ProductController', 'index'],
    '/cart' => ['App\Controllers\CartController', 'index'],
];

if (isset($routes[$uri])) {
    [$controller, $method] = $routes[$uri];
    $controller = new $controller();
    echo $controller->$method();
} else {
    http_response_code(404);
    echo '404 Not Found';
}