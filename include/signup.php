<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../classes/Db.php";

$db = new Db();

$err = "";
$success = "";

// Giá trị mặc định để không bị undefined khi load GET
$full_name = "";
$email = "";
$phone = "";
$address = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST["full_name"] ?? "");
    $email     = strtolower(trim($_POST["email"] ?? ""));
    $phone     = preg_replace('/\D+/', '', trim($_POST["phone"] ?? ""));
    $address   = trim($_POST["address"] ?? "");
    $password  = trim($_POST["password"] ?? "");
    $password2 = trim($_POST["password2"] ?? "");

    // Validate cơ bản
    if (empty($full_name) || empty($email) || empty($phone) || empty($password) || empty($password2)) {
        $err = "Vui lòng nhập đầy đủ thông tin.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Email không hợp lệ.";
    } elseif ($password !== $password2) {
        $err = "Mật khẩu nhập lại không khớp.";
    } else {    
        // Check trùng email
        $checkEmail = $db->exeQuery(
            "SELECT id FROM customer WHERE email = ? LIMIT 1",
            [$email]
        );
        if (!empty($checkEmail)) {
            $err = "Email đã tồn tại.";
        }

        // Check trùng phone (chỉ khi email chưa trùng)
        if (empty($err)) {
            $checkPhone = $db->exeQuery(
                "SELECT id FROM customer WHERE phone = ? LIMIT 1",
                [$phone]
            );
            if (!empty($checkPhone)) {
                $err = "Số điện thoại đã tồn tại.";
            }
        }

        // Insert khi không có lỗi
        if (empty($err)) {
            $sql = "INSERT INTO customer(full_name, email, phone, password, address, role)
                    VALUES (?, ?, ?, ?, ?, 'customer')";
            $affected = $db->exeNoneQuery($sql, [$full_name, $email, $phone, $password, $address]);

            if ($affected > 0) {
                header("Location: ./login.php");
                exit;
            } else {
                $err = "Đăng ký thất bại.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang đăng ký</title>
            <link rel="stylesheet" href="../css/auth.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container" style="max-width: 520px;">
        <div class="m-2">
            <h1>Đăng ký</h1>
            <hr>

            <?php if (!empty($err)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
           <div class="register-box">
            <form method="POST" action="">
                <label class="form-label">Tên đầy đủ</label>
                <input name="full_name" type="text" placeholder="Nhập tên"
                       class="form-control rounded-pill"
                       value="<?= htmlspecialchars($full_name ?? "") ?>" required>

                <label class="form-label mt-2">Email</label>
                <input name="email" type="email" placeholder="Nhập email"
                       class="form-control rounded-pill"
                       value="<?= htmlspecialchars($email ?? "") ?>" required>

                <label class="form-label mt-2">Số điện thoại</label>
                <input name="phone" type="text" placeholder="Nhập số điện thoại"
                       class="form-control rounded-pill"
                       value="<?= htmlspecialchars($phone ?? "") ?>" required>

                <label class="form-label mt-2">Địa chỉ</label>
                <input name="address" type="text" placeholder="Nhập địa chỉ"
                       class="form-control rounded-pill"
                       value="<?= htmlspecialchars($address ?? "") ?>">

                <label class="form-label mt-2">Mật khẩu</label>
                <input name="password" type="password" placeholder="Nhập mật khẩu"
                       class="form-control rounded-pill" required>

                <label class="form-label mt-2">Nhập lại mật khẩu</label>
                <input name="password2" type="password" placeholder="Nhập lại mật khẩu"
                       class="form-control rounded-pill" required>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
            </div>
        </div>

        <hr />  
        <div class="text-center">
            <p>
                Bạn đã có tài khoản?
                <a href="./login.php" class="fw-bold">Đăng nhập</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
