<?php
include 'part/header.php';
include 'class/exercisesClass.php';
$exercisesClass = new exercisesClass;
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $exercisesId = $_GET['exercisesId'];
    $get_exercises = $exercisesClass->select_exercises($exercisesId);
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercisesId = $_GET['exercisesId'];
    $data = $_POST;
    $update_exercises = $exercisesClass->update_exercises($data, $exercisesId);
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
                        <h1 class="h3 d-inline align-middle">Forms</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="card-title mb-3">Sửa tài liệu</label>
                                        <input type="text" name="exercisesName" value="<?php echo $get_exercises['exercisesName'] ?>" class="form-control" placeholder="Nhập tên tài liệu mới">
                                        <label for="datepicker" class="card-title mt-3">Chọn ngày</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="exercisesDate" value="<?php echo $get_exercises['exercisesDate'] ?>" class="form-control mb-3" placeholder="DD/MM/YYYY">

                                        </div>
                                        <label for="description" class="card-title mb-3">Mô tả</label>
                                        <textarea name="exercisesDes" value="<?php echo $get_exercises['exercisesDes'] ?>" class="form-control mb-3" rows="2" placeholder="Nhập mô tả mới..."></textarea>
                                        <label for="content" class="card-title mb-3">Nhập nội dung:</label>
                                        <textarea name="exercisesCon" value="<?php echo $get_exercises['exercisesCon'] ?>" class="form-control" rows="5" placeholder="Nhập nội dung mới..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-danger d-block">Cập nhật</button>
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