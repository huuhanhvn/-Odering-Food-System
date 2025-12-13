<?php
include_once 'db.php';
class Dish extends Db {
    
    public function __construct() {
        parent::__construct();
    }
    
    // Lấy tất cả món ăn
    public function getAll() {
        $query = "SELECT * FROM dish ORDER BY id DESC";
        return $this->exeQuery($query);
    }
    
    // Lấy món ăn theo danh mục
    public function getByCategory($category_name) {
        $query = "SELECT d.*, c.category_name 
                  FROM dish d 
                  LEFT JOIN category c ON d.category_id = c.id
                  WHERE c.category_name = ?
                  ORDER BY d.id DESC";
        return $this->exeQuery($query, [$category_name]);
    }
    
    // Tìm kiếm món ăn theo tên hoặc mô tả
    public function search($keyword) {
        $searchTerm = "%{$keyword}%";
        $query = "SELECT d.*, c.category_name 
                  FROM dish d 
                  LEFT JOIN category c ON d.category_id = c.id
                  WHERE d.dish_name LIKE ? 
                  OR d.description LIKE ?
                  ORDER BY d.id DESC";
        return $this->exeQuery($query, [$searchTerm, $searchTerm]);
    }
    
    // Lấy món ăn theo ID
    public function getById($id) {
        $query = "SELECT d.*, c.category_name 
                  FROM dish d 
                  LEFT JOIN category c ON d.category_id = c.id
                  WHERE d.id = ?";
        $result = $this->exeQuery($query, [$id]);
        return !empty($result) ? $result[0] : null;
    }
    
    // Thêm món ăn mới
    public function insert($dish_name, $image, $description, $price, $category_id) {
        $query = "INSERT INTO dish (dish_name, image, description, price, category_id) 
                  VALUES (?, ?, ?, ?, ?)";
        return $this->exeNoneQuery($query, [$dish_name, $image, $description, $price, $category_id]);
    }
    
    // Cập nhật món ăn
    public function update($id, $dish_name, $image, $description, $price, $category_id) {
        $query = "UPDATE dish 
                  SET dish_name = ?, image = ?, description = ?, price = ?, category_id = ? 
                  WHERE id = ?";
        return $this->exeNoneQuery($query, [$dish_name, $image, $description, $price, $category_id, $id]);
    }
    
    // Xóa món ăn
    public function delete($id) {
        $query = "DELETE FROM dish WHERE id = ?";
        return $this->exeNoneQuery($query, [$id]);
    }
    
    // Đếm tổng số món ăn
    public function count() {
        $query = "SELECT COUNT(*) as total FROM dish";
        $result = $this->exeQuery($query);
        return !empty($result) ? $result[0]['total'] : 0;
    }
    // Kiểm tra món ăn tồn tại
    public function exists($id) {
        $query = "SELECT id FROM dish WHERE id = ?";
        $result = $this->exeQuery($query, [$id]);
        return !empty($result);
    }
}
?>