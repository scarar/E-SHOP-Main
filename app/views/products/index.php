<div class="products-container">
    <h2>Products</h2>

    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="row product-row">
                <div class="col-md-3">
                    <div class="product-image">
                        <a href="/products/show/<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image'] ? '/uploads/' . htmlspecialchars($product['image']) : '/images/no_image.png'; ?>" 
                                 alt="<?php echo htmlspecialchars($product['title']); ?>" 
                                 class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-info">
                        <h3>
                            <a href="/products/show/<?php echo $product['id']; ?>">
                                <?php echo htmlspecialchars($product['title']); ?>
                            </a>
                        </h3>
                        <p class="price">Price: $<?php echo number_format($product['price'], 2); ?></p>
                        <p class="description"><?php echo htmlspecialchars($product['short_description']); ?></p>
                        <p class="vendor">
                            Vendor: 
                            <a href="/vendors/<?php echo urlencode($product['vendor']); ?>">
                                <?php echo htmlspecialchars($product['vendor']); ?>
                            </a>
                        </p>
                        <?php foreach ($categories as $category): ?>
                            <?php if ($category['id'] == $product['category_id']): ?>
                                <p class="category">
                                    Category: 
                                    <a href="/products?category=<?php echo $category['id']; ?>">
                                        <?php echo htmlspecialchars($category['title']); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-actions">
                        <a href="/products/show/<?php echo $product['id']; ?>" 
                           class="btn btn-primary btn-block">View Details</a>
                        
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] === $product['vendor']): ?>
                            <a href="/products/edit/<?php echo $product['id']; ?>" 
                               class="btn btn-default btn-block">Edit</a>
                            <form action="/products/delete/<?php echo $product['id']; ?>" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div class="text-center">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="<?php echo $i === $currentPage ? 'active' : ''; ?>">
                            <a href="/products?page=<?php echo $i; ?><?php echo isset($_GET['category']) ? '&category=' . htmlspecialchars($_GET['category']) : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-info">No products found.</div>
    <?php endif; ?>
</div>