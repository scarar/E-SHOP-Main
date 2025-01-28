<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() {
        $page = (int)($this->getQuery('page') ?? 1);
        $categoryId = $this->getQuery('category');
        $itemsPerPage = 5;
        $offset = ($page - 1) * $itemsPerPage;

        $conditions = [];
        if ($categoryId && is_numeric($categoryId)) {
            $conditions['category_id'] = (int)$categoryId;
        }

        $products = $this->productModel->findAll($conditions, $itemsPerPage, $offset);
        $totalProducts = $this->productModel->count($conditions);
        $totalPages = ceil($totalProducts / $itemsPerPage);
        $categories = $this->categoryModel->getAllCategories();

        $this->view('products/index', [
            'products' => $products,
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'currentCategory' => $categoryId
        ]);
    }

    public function show($id) {
        $product = $this->productModel->findById($id);
        
        if (!$product) {
            $this->redirect('/products');
        }

        $category = $this->categoryModel->findById($product['category_id']);
        
        $this->view('products/show', [
            'product' => $product,
            'category' => $category
        ]);
    }

    public function create() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }

        if ($this->isPost()) {
            try {
                $this->validateCSRF();
                
                $data = [
                    'title' => $this->getPost('title'),
                    'price' => $this->getPost('price'),
                    'short_description' => $this->getPost('short_description'),
                    'description' => $this->getPost('description'),
                    'category_id' => $this->getPost('category_id'),
                    'vendor' => $_SESSION['user']
                ];

                // Handle image upload
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/../../storage/uploads/';
                    $fileName = time() . '_' . basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $data['image'] = $fileName;
                    }
                }

                $productId = $this->productModel->createProduct($data);
                $this->redirect("/products/show/$productId");
            } catch (\Exception $e) {
                $categories = $this->categoryModel->getAllCategories();
                $this->view('products/create', [
                    'categories' => $categories,
                    'error' => $e->getMessage(),
                    'old' => $_POST
                ]);
            }
        } else {
            $categories = $this->categoryModel->getAllCategories();
            $this->view('products/create', [
                'categories' => $categories
            ]);
        }
    }

    public function edit($id) {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }

        $product = $this->productModel->findById($id);
        
        if (!$product || $product['vendor'] !== $_SESSION['user']) {
            $this->redirect('/products');
        }

        if ($this->isPost()) {
            try {
                $this->validateCSRF();
                
                $data = [
                    'title' => $this->getPost('title'),
                    'price' => $this->getPost('price'),
                    'short_description' => $this->getPost('short_description'),
                    'description' => $this->getPost('description'),
                    'category_id' => $this->getPost('category_id')
                ];

                // Handle image upload
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/../../storage/uploads/';
                    $fileName = time() . '_' . basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $data['image'] = $fileName;
                        
                        // Remove old image
                        if ($product['image'] && file_exists($uploadDir . $product['image'])) {
                            unlink($uploadDir . $product['image']);
                        }
                    }
                }

                $this->productModel->updateProduct($id, $data);
                $this->redirect("/products/show/$id");
            } catch (\Exception $e) {
                $categories = $this->categoryModel->getAllCategories();
                $this->view('products/edit', [
                    'product' => $product,
                    'categories' => $categories,
                    'error' => $e->getMessage(),
                    'old' => $_POST
                ]);
            }
        } else {
            $categories = $this->categoryModel->getAllCategories();
            $this->view('products/edit', [
                'product' => $product,
                'categories' => $categories
            ]);
        }
    }

    public function delete($id) {
        if (!isset($_SESSION['user'])) {
            $this->json(['success' => false, 'message' => 'Unauthorized']);
        }

        $product = $this->productModel->findById($id);
        
        if (!$product || $product['vendor'] !== $_SESSION['user']) {
            $this->json(['success' => false, 'message' => 'Unauthorized']);
        }

        try {
            $this->validateCSRF();
            
            // Delete product image
            if ($product['image']) {
                $uploadDir = __DIR__ . '/../../storage/uploads/';
                if (file_exists($uploadDir . $product['image'])) {
                    unlink($uploadDir . $product['image']);
                }
            }

            $this->productModel->delete($id);
            $this->json(['success' => true]);
        } catch (\Exception $e) {
            $this->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}