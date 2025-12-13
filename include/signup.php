<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang đăng ký</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="m-2">
        <h1>Đăng ký</h1>
        <hr>
        <div>
            <label class="form-label">Tên đầy đủ</label>
            <input type="text" placeholder="Nhập tên" class="form-control rounded-pill">
            <label class="form-label">Email</label>
            <input type="text" placeholder="Nhập email" class="form-control rounded-pill">
            <label class="form-label">Số điện thoại</label>
            <input type="text" placeholder="Nhập số điện thoại" class="form-control rounded-pill">
            <label class="form-label">Mật khẩu</label>
            <input type="password" placeholder="Nhập mật khẩu" class="form-control rounded-pill">
            <label class="form-label">Nhập lại mật khẩu</label>
            <input type="password" placeholder="Nhập lại mật khẩu" class="form-control rounded-pill">
        </div>
    </div>
    <br>    
   <div class="text-center">
        <input name="login" type="submit" value="Đăng ký" class="btn btn-primary " />
        <br><br>
        <a href="" class="btn d-flex justify-content-center align-items-center border rounded p-2">
                <img name="loginGoogle" src="/public/img/google.png" alt="icon google" width="20px" height="20px"   >
                Sign up with Google </a>
   </div>
   <hr />
    <div class="text-center">
    <p>
       Bạn chưa đã có tài khoản?
        <a href="" class="fw-bold" name="dangki">Đăng nhập</a>
    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>