<?php
include_once 'db.php';
class Category extends Db {
    
    public function __construct() {
        parent::__construct();
    }
    
    // Lấy tất cả danh mục
    public function getAll() {
        $query = "SELECT * FROM category ORDER BY id ASC";
        return $this->exeQuery($query);
    }
    // Thêm danh mục mới
    public function insert($category_name) {
        $query = "INSERT INTO category (category_name) VALUES (?)";
        return $this->exeNoneQuery($query, [$category_name]);
    }
    
    // Cập nhật danh mục
    public function update($id, $category_name) {
        $query = "UPDATE category SET category_name = ? WHERE id = ?";
        return $this->exeNoneQuery($query, [$category_name, $id]);
    }
    
    // Xóa danh mục
    public function delete($id) {
        $query = "DELETE FROM category WHERE id = ?";
        return $this->exeNoneQuery($query, [$id]);
    }
    // Kiểm tra danh mục tồn tại
    public function exists($id) {
        $query = "SELECT id FROM category WHERE id = ?";
        $result = $this->exeQuery($query, [$id]);
        return !empty($result);
    }
}
?>
