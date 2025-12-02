<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang đăng nhập</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-6">
                <div class="card shadow border-0" >
                    <div class="card-body">
                        <h1 class="text-center ">Đăng nhập</h1>
        
                        <form method="post">
                            <input name="email" class="form-control" placeholder="Email" />            
                            <br />
                            <input name="password" type="password" class="form-control" placeholder="Mật khẩu" />
                            <br />
                            <div class="text-center">
                               <input name="dangnhap" type="submit" value="Đăng nhập" class="btn btn-primary " />
                               <br><br>
                               <div class="d-flex justify-content-center align-items-center border rounded p-2">
                                   <img src="/public/img/google.png" alt="icon google" width="20px" height="20px"   >
                                   Sign in with Google
                               </div>
                            </div>
                            <hr />
                            <div class="text-center">
                                <p>
                                    Bạn chưa có tài khoản?
                                    <a href="" class="fw-bold" name="dangki">Đăng ký ngay</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

