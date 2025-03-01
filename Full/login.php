<!-- login.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .g-signin-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px;
            border: 1px solid #4285f4;
            border-radius: 4px;
            background-color: #fff;
            color: #4285f4;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .g-signin-btn img {
            width: 20px;
            margin-right: 10px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Đăng Nhập</h4>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        ?>

                        <form action="process_login.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                        </form>


                        <div class="mt-3">
                            <div id="g_id_onload"
                                data-client_id="YOUR_GOOGLE_CLIENT_ID"
                                data-login_uri="http://localhost:3000/dangnhap.php"
                                data-auto_prompt="false">
                            </div>
                            <div class="g_id_signin"
                                data-type="standard"
                                data-size="large"
                                data-theme="outline"
                                data-text="sign_in_with"
                                data-shape="rectangular"
                                data-logo_alignment="left">
                            </div>
                        </div>

                        <p class="mt-3 text-center">Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm Google Identity Services script -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>