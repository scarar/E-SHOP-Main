<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return parent::create($data);
    }

    public function findByEmail($email)
    {
        $stmt = self::$db->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}