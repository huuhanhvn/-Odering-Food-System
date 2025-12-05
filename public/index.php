<?php
$products_path = dirname(__DIR__) . '/products.php';

if (file_exists($products_path)) {
    include $products_path;
} else {
    error_log("Không tìm thấy file products.php: " . $products_path);
    $filtered_products = [];
    $categories = [];
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
               
                    <input type="hidden" name="category" value="">
            
                <input type="text" name="search" class="search-input" placeholder="Tìm kiếm sản phẩm" value="">
                <button type="submit" class="search-btn">🔍</button>
            </form>
        </div> 

        <div class="header-actions">
            <a href="#" class="btn btn-cart">🛒 Giỏ hàng</a>
            <a href="login.php" class="btn btn-login">Đăng nhập</a>
            <a href="signup.php" class="btn btn-admin">Đăng kí</a>
        </div>
    </div>

<div class="body">
    <div class="view-products bg-white w-100">
            <!-- Danh sách danh mục -->

        <div class="container d-flex justify-content-between my-3 gap-3">
           <?php foreach ($categories as $ct): ?>
               <a href="?category=<?= urlencode($ct) ?>" class="btn rounded-pill flex-fill text-white" 
                 style="background-color:#b71c1c">
                 <?= htmlspecialchars($ct) ?>
                </a>
           <?php endforeach; ?>
</div>
            <!-- Danh sách sản phẩm -->
         <div class="row">
        <?php foreach ($filtered_products as $p): ?>
        <div class="col-3 mb-4">
            <div class="card shadow-lg text-center">
                <img src="<?= $p['image'] ?>" class="card-img-top" style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <h5><?= $p['name'] ?></h5>
                    <p class="text-danger fw-bold"><?= number_format($p['price'], 0) ?> đ</p>
                    <a href="detail.php?id=<?= $p['id'] ?>" class="btn btn-danger rounded-pill px-4">
                        Chọn
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>