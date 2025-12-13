
<?php
require_once __DIR__ . '/../../config/config.php';
$dishModel = new Dish();
$categoryModel = new Category();

$categories = $categoryModel->getAll();

$current_category = $_GET['category'] ?? '';
$search_keyword   = $_GET['search'] ?? '';

if ($search_keyword) {
    $dishes = $dishModel->search($search_keyword);
} elseif ($current_category) {
    $dishes = $dishModel->getByCategory($current_category);
} else {
    $dishes = $dishModel->getAll();
}
?>
    <div class="view-products bg-white w-100">
            <!-- Danh sách danh mục -->
        <div class="container d-flex justify-content-between my-3 gap-3">
                <a href="<?= BASE_URL ?>layout.php?mod=home&act=index" 
                   class="btn rounded-pill flex-fill text-white <?= empty($current_category) ? 'active' : '' ?>" 
                   style="background-color:#b71c1c">
                    Tất cả
                </a>
                
                <!-- Các danh mục -->
                <?php foreach ($categories as $ct): ?>
                    <a href="<?= BASE_URL ?>layout.php?mod=home&act=index&category=<?= urlencode($ct['category_name']) ?>" 
                       class="btn rounded-pill flex-fill text-white <?= $current_category == $ct['category_name'] ? 'active' : '' ?>" 
                       style="background-color:#b71c1c">
                        <?= htmlspecialchars($ct['category_name']) ?>
                    </a>
                <?php endforeach; ?>
        </div>
            <!-- Danh sách sản phẩm -->
         <div class="row">
        <?php foreach ($dishes as $d): ?>
        <div class="col-3 mb-4">
            <div class="card shadow-lg text-center">
                <img src="<?= BASE_URL ?>/img/<?= $d['image'] ?>" class="card-img-top" style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <h5><?= $d['dish_name'] ?></h5>
                    <p class="text-danger fw-bold"><?= number_format($d['price'], 0) ?> đ</p>
                    <a href="detail.php?id=<?= $d['id'] ?>" class="btn btn-danger rounded-pill px-4">
                        Chọn
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>