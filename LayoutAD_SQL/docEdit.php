<?php
include 'part/header.php';
include 'class/docClass.php';
$docClass = new DocClass;
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $docId = $_GET['docId'];
    $get_doc = $docClass->select_doc($docId);
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docId = $_GET['docId'];
    $data = $_POST;
    $update_doc = $docClass->update_doc($data, $docId);
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
                                        <input type="text" name="docName" value="<?php echo $get_doc['docName'] ?>" class="form-control" placeholder="Nhập tên tài liệu mới">
                                        <label for="datepicker" class="card-title mt-3">Chọn ngày</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="docDate" value="<?php echo $get_doc['docDate'] ?>" class="form-control mb-3" placeholder="DD/MM/YYYY">

                                        </div>
                                        <label for="description" class="card-title mb-3">Mô tả</label>
                                        <textarea name="docDes" value="<?php echo $get_doc['docDes'] ?>" class="form-control mb-3" rows="2" placeholder="Nhập mô tả mới..."></textarea>
                                        <label for="content" class="card-title mb-3">Nhập nội dung:</label>
                                        <textarea name="docCon" value="<?php echo $get_doc['docCon'] ?>" class="form-control" rows="5" placeholder="Nhập nội dung mới..."></textarea>
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