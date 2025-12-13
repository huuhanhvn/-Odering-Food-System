<?php
session_start();
require_once __DIR__ . '/config/config.php';

$mod = $_GET['mod'] ?? 'home';
$act = $_GET['act'] ?? 'index';

$module_path = __DIR__ . "/module/{$mod}/{$act}.php";

if (file_exists($module_path)) {
    include $module_path;
} else {
    echo "Không tìm thấy module";
}
