<?php
include 'part/header.php';
include 'class/exercisesClass.php';
$exercisesClass = new exercisesClass;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $insert_exercises = $exercisesClass->insert_exercises($data);
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
                <div class="container-fluid p-0"><br>
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">THÊM BÀI TẬP</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="card-title mt-3">Thuộc thư mục</label>

                                        <select class="form-select mb-3" name="dictoryId">
                                            <option value="#">Chọn thư mục</option>
                                            <?php
                                            $select_dictory = $exercisesClass->select_dictory_All();
                                            if ($select_dictory->num_rows > 0) {
                                                while ($result = $select_dictory->fetch_assoc()) {
                                                    echo '<option value="' . $result['dictoryId'] . '">' . $result['dictoryName'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="#">Không có thư mục nào</option>';
                                            }
                                            ?>
                                        </select><br>
                                        <label class="card-title mb-3">Tên bài tập</label>
                                        <input type="text" name="exercisesName" class="form-control" placeholder="Nhập tên tài liệu">


                                        <label for="description" class="card-title mb-3">Mô tả</label>
                                        <textarea name="exercisesDes" class="form-control mb-3" rows="2" placeholder="Nhập mô tả..." style="resize: none; max-height: 150px; overflow-y: auto;"></textarea>
                                        <label for="content" class="card-title mb-3">Nhập nội dung:</label>
                                        <textarea name="exercisesCon" class="form-control" rows="5" placeholder="Nhập nội dung tại đây..." style="resize: none; max-height: 200px; overflow-y: auto;"></textarea>
                                        <button type="submit" class="btn btn-danger d-block mt-3">Thêm</button>
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