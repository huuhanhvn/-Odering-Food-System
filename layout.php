<?php
require_once __DIR__ . '/config/config.php';

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Đặt Món Ăn Online</title>
</head>
<body>
    <div class="header">
        <div class="logo">
           <img src="<?= BASE_URL ?>/img/iconfood.png" alt="Ảnh bị lỗi" width="50px" height="50px"   >
            <span class="logo-text">Đặt Món Ăn Online</span>
        </div>

        <div class="search-container">
            <form action="<?= BASE_URL ?>layout.php" method="GET">
                <input type="hidden" name="mod" value="home">
                <input type="hidden" name="act" value="index">
                <input type="text" name="search" class="search-input" 
                       placeholder="Tìm kiếm sản phẩm" 
                       value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <button type="submit" class="search-btn">🔍</button>
            </form>
        </div> 

        <div class="header-actions">
          <a href="<?= BASE_URL ?>layout.php?mod=cart&act=index" class="btn btn-cart">
    🛒 Giỏ hàng
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <span class="badge bg-danger"><?= count($_SESSION['cart']) ?></span>
    <?php endif; ?>
</a>
            <a href="login.php" class="btn btn-login">Đăng nhập</a>
            <a href="signup.php" class="btn btn-admin">Đăng kí</a>
        </div>
    </div>
    <div class="body">
        <?php include 'mod.php'; ?>
    </div>
</body>
</html>