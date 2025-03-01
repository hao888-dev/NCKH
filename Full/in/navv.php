<?php
session_start();
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="doc.php">Tài liệu</a></li>
                <li class="nav-item"><a class="nav-link" href="exercises.php">Bài tập</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đề thi</a></li>
                <li class="nav-item"><a class="nav-link" href="chat.php">Thảo luận</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['usersId'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>