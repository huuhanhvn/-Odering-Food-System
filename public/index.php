<?php
// Dữ liệu sản phẩm mẫu
$products = [
    [
        'id' => 1,
        'name' => 'Mì Bạch Tuộc',
        'price' => 60000,
        'category' => 'mi',
        'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400'
    ],
    [
        'id' => 2,
        'name' => 'Mì Hải Sản',
        'price' => 60000,
        'category' => 'mi',
        'image' => 'https://images.unsplash.com/photo-1617093727343-374698b1b08d?w=400'
    ],
    [
        'id' => 3,
        'name' => 'Trà Đào',
        'price' => 20000,
        'category' => 'nuoc',
        'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400'
    ],
    [
        'id' => 4,
        'name' => 'Trà Ổi',
        'price' => 20000,
        'category' => 'nuoc',
        'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400'
    ],
    [
        'id' => 5,
        'name' => 'Bánh Bông Lan',
        'price' => 35000,
        'category' => 'banh',
        'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400'
    ],
    [
        'id' => 6,
        'name' => 'Bánh Flan',
        'price' => 25000,
        'category' => 'banh',
        'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400'
    ],
    [
        'id' => 7,
        'name' => 'Kẹo Dẻo',
        'price' => 15000,
        'category' => 'keo',
        'image' => 'https://images.unsplash.com/photo-1582058091505-f87a2e55a40f?w=400'
    ],
    [
        'id' => 8,
        'name' => 'Cơm Gà Xối Mở',
        'price' => 45000,
        'category' => 'com',
        'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=400'
    ],
];

// Lọc sản phẩm theo danh mục
$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$filtered_products = $products;

if ($category) {
    $filtered_products = array_filter($products, function($product) use ($category) {
        return $product['category'] == $category;
    });
}

if ($search) {
    $filtered_products = array_filter($filtered_products, function($product) use ($search) {
        return stripos($product['name'], $search) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Đặt Món Ăn Online</title>
</head>
<body>
    <div class="header">
        <div class="logo">
           <img src="/public/img/iconfood.png" alt="Ảnh bị lỗi" width="50px" height="50px"   >
            <span class="logo-text">Đặt Món Ăn Online</span>
        </div>

        <div class="search-container">
            <form action="" method="GET">
                <?php if ($category): ?>
                    <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
                <?php endif; ?>
                <input type="text" name="search" class="search-input" placeholder="Tìm kiếm sản phẩm" value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="search-btn">🔍</button>
            </form>
        </div>

        <div class="header-actions">
            <a href="#" class="btn btn-cart">🛒 Giỏ hàng</a>
            <a href="login.php" class="btn btn-login">Đăng nhập</a>
            <a href="#" class="btn btn-admin">Đăng kí</a>
        </div>
    </div>

<div class="body">
    <div class="view-products col-8 bg-dark">
        View Products
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>