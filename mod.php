<?php
// Lấy tham số module và action
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

// Định nghĩa đường dẫn module
$module_path = __DIR__ . "/module/{$mod}/{$act}.php";

// Kiểm tra file module có tồn tại không
if (file_exists($module_path)) {
    include $module_path;
} else {
    // Nếu không tìm thấy, chuyển về trang chủ
    header("Location: mod.php?mod=home&act=index");
    exit;
}
?>