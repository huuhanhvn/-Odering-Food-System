<?php
require_once __DIR__ . '/../../classes/db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$db = new Db();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    $sql = "SELECT * FROM dish WHERE id = ?";
    $product = $db->exeQuery($sql, [$product_id]);
    
    if (!empty($product)) {
        $product = $product[0];
        
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'id' => $product['id'],
                'name' => $product['dish_name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $quantity
            ];
        }
    }
}

if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$product_id]);
        } else {
            $_SESSION['cart'][$product_id]['quantity'] = (int)$quantity;
        }
    }
    echo "<script>alert('Đã cập nhật giỏ hàng!');</script>";
}

if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: " . BASE_URL . "/layout.php?mod=cart&act=index");
    exit();
}

if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: " . BASE_URL . "/layout.php?mod=cart&act=index");
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$cart_count = array_sum(array_column($_SESSION['cart'], 'quantity'));
?>

<div class="container mt-4">
    <h1>Giỏ Hàng Của Bạn (<?= $cart_count ?> sản phẩm)</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="alert alert-info">
            <h4>Giỏ hàng của bạn đang trống</h4>
            <p>Hãy thêm sản phẩm vào giỏ hàng để tiếp tục mua sắm</p>
            <a href="<?= BASE_URL ?>/layout.php?mod=home&act=index" class="btn btn-primary">
                ← Tiếp tục mua sắm
            </a>
        </div>
    <?php else: ?>
        <form method="POST" action="">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($item['name']) ?></strong>
                            </td>
                            <td>
                                <span class="text-danger"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                            </td>
                            <td>
                                <input type="number" 
                                       name="quantity[<?= $item['id'] ?>]" 
                                       value="<?= $item['quantity'] ?>" 
                                       min="1" 
                                       class="form-control" 
                                       style="width: 80px;">
                            </td>
                            <td>
                                <strong class="text-danger">
                                    <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ
                                </strong>
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>/layout.php?mod=cart&act=index&remove=<?= $item['id'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <button type="submit" name="update_cart" class="btn btn-success me-2">
                        Cập nhật giỏ hàng
                    </button>
                    <a href="<?= BASE_URL ?>/layout.php?mod=cart&act=index&clear=1" 
                       class="btn btn-secondary me-2"
                       onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')">
                        Xóa toàn bộ
                    </a>
                    <a href="<?= BASE_URL ?>/layout.php?mod=home&act=index" class="btn btn-primary">
                        ← Tiếp tục mua sắm
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <h3>Tổng tiền: <span class="text-danger"><?= number_format($total, 0, ',', '.') ?>đ</span></h3>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>