<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Admin</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="navbar bg-opacity-50 justify-content-start shadow-lg">
        <div class="nav-link"><button class="btn btn-light text-primary">Trang Admin</button></div>
        <div class="nav-link"><a class="btn btn-light text-primary" href="trangchu.php">Trang chủ</a></div> 
    </div>
    
    <div class="d-flex vh-100 ">
        <div style="width:200px; background-color:darkgray;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle w-100 border-dark"
                        data-bs-toggle="dropdown">
                    Sản phẩm
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add_product.php">Thêm sản phẩm</a></li>
                    <li><a class="dropdown-item" href="delete_product.php">Xóa sản phẩm</a></li>
                   <li><a class="dropdown-item" href="edit_product.php">Chỉnh sửa thông tin sản phẩm</a></li>
                    <li><a class="dropdown-item" href="list_product.php">Danh sách sản phẩm</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle w-100 border-dark"
                        data-bs-toggle="dropdown" >
                    Đơn hàng
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ds_donhang.php">Danh sách đơn hàng</a></li>
                </ul>
            </div>
        </div>
        
        <div class="bg-white flex-grow-1 p-3">
            <?php 
                if (isset($content)) {
                    echo $content;
                }
            ?>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>