<?php
include 'in/head.php';
include 'in/navv.php';
?>
<div class="container mt-4">
    <div class="row">
        <aside class="col-md-3">
            <div class="bg-light p-3 border rounded">
                <h5>Cập nhật thông tin</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Tin mới nhất</a></li>
                    <li><a href="#">Thông báo lớp học</a></li>
                    <li><a href="#">Hướng dẫn học tập</a></li>
                </ul>
            </div>
        </aside>

        <main class="col-md-9">
            <div class="text-center">
                <img src="https://via.placeholder.com/800x300" class="img-fluid rounded" alt="Ảnh giới thiệu">
                <h3 class="mt-3">Chào mừng đến với Website Học Tập</h3>
                <p>Nơi cung cấp tài liệu học tập, bài tập, đề thi và diễn đàn thảo luận để hỗ trợ sinh viên.</p>

                <?php

                if (isset($_GET['success'])) {
                    echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
                }
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                }


                if (isset($_SESSION['usersId'])) {
                    echo '<div class="alert alert-info">Xin chào, ' . htmlspecialchars($_SESSION['name']) . '! Email: ' . htmlspecialchars($_SESSION['email']) . '</div>';
                }
                ?>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>