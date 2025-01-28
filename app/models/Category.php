<?php
namespace App\Models;

use App\Core\Model;

class Category extends Model {
    protected $table = 'categories';

    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY title ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createCategory($data) {
        if (empty($data['title'])) {
            throw new \Exception("Category title is required");
        }

        $data['title'] = htmlspecialchars($data['title']);
        return $this->create($data);
    }

    public function getProductCount($categoryId) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM products WHERE category_id = ?");
        $stmt->execute([$categoryId]);
        return $stmt->fetchColumn();
    }
}