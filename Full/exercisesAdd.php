<?php
include 'part/header.php';
include 'class/exercisesClass.php';
$exercisesClass = new exercisesClass;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $title = $data['exercisesName'];
    $file = $_FILES['pdfFile'];

    if ($file['type'] == 'application/pdf') {
        $pdfName = uniqid() . '_' . $file['name'];
        $destination = 'uploads/' . $pdfName;


        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
        if (!is_writable('uploads')) {
            echo "Thư mục uploads không có quyền ghi!";
            exit;
        }


        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $pdfId = $data['pdfId'];
            $insert_result = $exercisesClass->insert_exercises($data, $pdfName, $pdfId);

            if ($insert_result) {
                echo "Upload successful!";
            } else {
                echo "Failed to save to database.";
            }
        } else {
            echo "Failed to upload file. Error details: " . error_get_last()['message'];
        }
    } else {
        echo "Please upload a PDF file.";
    }
}
?>

<body>
    <?php include 'part/slibar.php'; ?>

    <div class="main">
        <?php include 'part/nav.php'; ?>

        <form action="" method="post" enctype="multipart/form-data">
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
                                                    echo '<option value="' . htmlspecialchars($result['dictoryId']) . '">' . htmlspecialchars($result['dictoryName']) . '</option>';
                                                }
                                            } else {
                                                echo '<option value="#">Không có thư mục nào</option>';
                                            }
                                            ?>
                                        </select><br>

                                        <label class="card-title mb-3">Tên bài tập</label>
                                        <input type="text" name="exercisesName" class="form-control" placeholder="Nhập tên tài liệu" required>

                                        <label class="card-title mt-3">Thêm ID file</label>
                                        <input type="text" name="pdfId" class="form-control" required>

                                        <label for="description" class="card-title mt-3">Mô tả</label>
                                        <textarea name="exercisesDes" class="form-control mb-3" rows="2" placeholder="Nhập mô tả..." style="resize: none; max-height: 150px; overflow-y: auto;"></textarea>

                                        <label class="card-title mb-3">Tải file PDF:</label>
                                        <input type="file" name="pdfFile" class="form-control mb-3" accept=".pdf" required>

                                        <button type="submit" class="btn btn-danger d-block mt-3">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </form>
    </div>

    <?php include 'part/footer.php'; ?>
</body>

</html>