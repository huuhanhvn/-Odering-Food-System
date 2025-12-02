
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
            <a href="signup.php" class="btn btn-admin">Đăng kí</a>
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