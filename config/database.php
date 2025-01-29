<?php

return [
    'database' => [
        'db_name' => getenv('DB_NAME') ?: 'eshop',
        'db_user' => getenv('DB_USER') ?: 'eshopuser@localhost',
        'db_password' => getenv('DB_PASSWORD') ?: 'r0m30@)!&0nion',
        'db_host' => getenv('DB_HOST') ?: 'localhost',
    ],
    'application' => [
        'app_email' => getenv('APP_EMAIL') ?: 'mailer@myapp.com',
        'app_url' => getenv('APP_URL') ?: 'myapp.com',
    ]
];