<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected $table = 'users';

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function authenticate($username, $password) {
        $user = $this->findByUsername($username);
        
        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password_hash'])) {
            return false;
        }

        return $user;
    }

    public function createUser($data) {
        // Validate required fields
        $required = ['username', 'password', 'email'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new \Exception("Field $field is required");
            }
        }

        // Validate username uniqueness
        if ($this->findByUsername($data['username'])) {
            throw new \Exception("Username already exists");
        }

        // Validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email format");
        }

        // Hash password
        $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['password']);

        // Sanitize data
        $data['username'] = htmlspecialchars($data['username']);
        $data['email'] = htmlspecialchars($data['email']);

        return $this->create($data);
    }

    public function updatePassword($userId, $currentPassword, $newPassword) {
        $user = $this->findById($userId);
        
        if (!$user) {
            throw new \Exception("User not found");
        }

        if (!password_verify($currentPassword, $user['password_hash'])) {
            throw new \Exception("Current password is incorrect");
        }

        return $this->update($userId, [
            'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);
    }

    public function enable2FA($userId, $publicKey) {
        return $this->update($userId, [
            '2fa_enabled' => 1,
            'public_key' => $publicKey
        ]);
    }

    public function disable2FA($userId) {
        return $this->update($userId, [
            '2fa_enabled' => 0,
            'public_key' => null
        ]);
    }
}