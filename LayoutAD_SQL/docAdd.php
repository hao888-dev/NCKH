<?php
include 'part/header.php';
include 'class/docClass.php';
$docClass = new DocClass;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $insert_doc = $docClass->insert_doc($data);
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
                        <h1 class="h3 d-inline align-middle">THÊM TÀI LIỆU</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="card-title mb-3">Tên tài liệu</label>
                                        <input type="text" name="docName" class="form-control" placeholder="Nhập tên tài liệu">
                                    </div>
                                    <div class="mb-3">
                                        <label for="datepicker" class="card-title mt-3">Chọn ngày</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="docDate" class="form-control mb-3" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="card-title mb-3">Mô tả</label>
                                        <textarea name="docDes" class="form-control mb-3" rows="4" placeholder="Nhập mô tả..." style="resize: none; max-height: 150px; overflow-y: auto;"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="card-title mb-3">Nhập nội dung:</label>
                                        <textarea name="docCon" class="form-control mb-3" rows="5" placeholder="Nhập nội dung tại đây..." style="resize: none; max-height: 200px; overflow-y: auto;"></textarea>
                                    </div>
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