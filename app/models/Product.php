<?php
namespace App\Models;

use App\Core\Model;

class Product extends Model {
    protected $table = 'products';

    public function getByCategory($categoryId, $limit = null, $offset = null) {
        return $this->findAll(['category_id' => $categoryId], $limit, $offset);
    }

    public function getByVendor($vendorUsername, $limit = null, $offset = null) {
        return $this->findAll(['vendor' => $vendorUsername], $limit, $offset);
    }

    public function search($query, $limit = null, $offset = null) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE title LIKE ? OR short_description LIKE ? OR description LIKE ?";
        $params = ["%$query%", "%$query%", "%$query%"];

        if ($limit !== null) {
            $sql .= " LIMIT ?";
            $params[] = (int)$limit;
            
            if ($offset !== null) {
                $sql .= " OFFSET ?";
                $params[] = (int)$offset;
            }
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function createProduct($data) {
        // Validate required fields
        $required = ['title', 'price', 'short_description', 'vendor', 'category_id'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new \Exception("Field $field is required");
            }
        }

        // Sanitize data
        $data['title'] = htmlspecialchars($data['title']);
        $data['short_description'] = htmlspecialchars($data['short_description']);
        $data['description'] = htmlspecialchars($data['description'] ?? '');
        $data['price'] = (float)$data['price'];
        $data['category_id'] = (int)$data['category_id'];

        return $this->create($data);
    }

    public function updateProduct($id, $data) {
        // Validate product exists
        $product = $this->findById($id);
        if (!$product) {
            throw new \Exception("Product not found");
        }

        // Sanitize data
        if (isset($data['title'])) {
            $data['title'] = htmlspecialchars($data['title']);
        }
        if (isset($data['short_description'])) {
            $data['short_description'] = htmlspecialchars($data['short_description']);
        }
        if (isset($data['description'])) {
            $data['description'] = htmlspecialchars($data['description']);
        }
        if (isset($data['price'])) {
            $data['price'] = (float)$data['price'];
        }
        if (isset($data['category_id'])) {
            $data['category_id'] = (int)$data['category_id'];
        }

        return $this->update($id, $data);
    }
}