<?php
return [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'name' => getenv('DB_NAME') ?: include("/etc/return_db_array.php")['db_name'],
    'user' => getenv('DB_USER') ?: include("/etc/return_db_array.php")['db_user'],
    'password' => getenv('DB_PASSWORD') ?: include("/etc/return_db_array.php")['db_password'],
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];