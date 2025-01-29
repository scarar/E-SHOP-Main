<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../src/Views');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../../storage/cache',
            'debug' => true,
        ]);
    }

    protected function render($template, $data = [])
    {
        return $this->twig->render($template, $data);
    }

    protected function json($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
    }

    protected function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }

    protected function validateRequest($rules)
    {
        $errors = [];
        foreach ($rules as $field => $rule) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                $errors[$field] = "The {$field} field is required.";
                continue;
            }

            if (strpos($rule, 'email') !== false && !filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = "The {$field} must be a valid email address.";
            }

            if (strpos($rule, 'min:') !== false) {
                preg_match('/min:(\d+)/', $rule, $matches);
                $min = $matches[1];
                if (strlen($_POST[$field]) < $min) {
                    $errors[$field] = "The {$field} must be at least {$min} characters.";
                }
            }
        }

        return $errors;
    }
}