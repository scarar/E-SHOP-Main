<?php
use App\Models\Category;

$categoryModel = new Category();
$categories = $categoryModel->getAllCategories();
?>

<div class="sidebar-content">
    <h3>Categories</h3>
    <div class="list-group">
        <a href="/products" class="list-group-item<?php echo !isset($_GET['category']) ? ' active' : ''; ?>">
            All Products
        </a>
        <?php foreach ($categories as $category): ?>
            <a href="/products?category=<?php echo $category['id']; ?>" 
               class="list-group-item<?php echo isset($_GET['category']) && $_GET['category'] == $category['id'] ? ' active' : ''; ?>">
                <?php echo htmlspecialchars($category['title']); ?>
                <span class="badge"><?php echo $categoryModel->getProductCount($category['id']); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
</div>