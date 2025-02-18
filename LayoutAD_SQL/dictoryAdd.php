<?php
include 'part/header.php';
include 'class/dictoryClass.php';
$dictoryClass = new DirectoryClass;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $insert_dictory = $dictoryClass->insert_dictory($data);
}
?>



<body>
    <?php
    include 'part/slibar.php';
    ?>



    <div class="main">
        <?php include 'part/nav.php'; ?>


        <form action="" method="post">
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">THÊM THƯ MỤC</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="card-title mb-3">Tên thư mục</h5>
                                        <input type="text" name="dictoryName" class="form-control" placeholder="Nhập tên thư mục mới">
                                    </div>
                                    <button type="submit" class="btn btn-danger d-block">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </form>
    </div>
    <?php
    include 'part/footer.php';
    ?>



</body>

</html>