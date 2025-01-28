<?php
return [
    'name' => 'E-Shop',
    'url' => getenv('APP_URL') ?: 'http://localhost',
    'env' => getenv('APP_ENV') ?: 'production',
    'debug' => getenv('APP_DEBUG') === 'true',
    'timezone' => 'UTC',
    'locale' => 'en',
    'key' => getenv('APP_KEY'),
    
    'upload' => [
        'max_size' => 10 * 1024 * 1024, // 10MB
        'allowed_types' => ['jpg', 'jpeg', 'png', 'gif'],
        'path' => __DIR__ . '/../../storage/uploads'
    ],
    
    'security' => [
        'password_min_length' => 8,
        'max_login_attempts' => 5,
        'lockout_time' => 900, // 15 minutes
        'session_lifetime' => 7200, // 2 hours
    ]
];