<?php

namespace App\Middleware;

class AuthMiddleware
{
    public function handle()
    {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login.php');
            exit;
        }

        // Regenerate session ID periodically to prevent session fixation
        if (!isset($_SESSION['last_regeneration']) || 
            time() - $_SESSION['last_regeneration'] >= 1800) {
            session_regenerate_id(true);
            $_SESSION['last_regeneration'] = time();
        }

        // CSRF protection
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                http_response_code(403);
                die('Invalid CSRF token');
            }
        }

        return true;
    }

    public static function generateCsrfToken()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}