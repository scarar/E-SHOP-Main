<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class Model
{
    protected static $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        if (!self::$db) {
            $config = require __DIR__ . '/../../config/database.php';
            try {
                self::$db = new PDO(
                    "mysql:host={$config['database']['db_host']};dbname={$config['database']['db_name']}",
                    $config['database']['db_user'],
                    $config['database']['db_password'],
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                throw new \Exception("Connection failed: " . $e->getMessage());
            }
        }
    }

    public function find($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = self::$db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));
        
        $stmt = self::$db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$values})");
        $stmt->execute(array_values($data));
        
        return self::$db->lastInsertId();
    }

    public function update($id, array $data)
    {
        $sets = [];
        foreach ($data as $key => $value) {
            $sets[] = "{$key} = :{$key}";
        }
        $data['id'] = $id;
        
        $stmt = self::$db->prepare(
            "UPDATE {$this->table} SET " . implode(', ', $sets) . " WHERE {$this->primaryKey} = :id"
        );
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = self::$db->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
        return $stmt->execute(['id' => $id]);
    }
}