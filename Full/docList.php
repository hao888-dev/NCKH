<?php
include 'part/header.php';
include 'class/docClass.php';
$docClass = new DocClass;
?>
<?php
$selectAll = $docClass->select_doc_All();
?>


<body>
    <?php
    include 'part/slibar.php';
    ?>


    <div class="main">
        <?php include 'part/nav.php'; ?>


        <main class="content">
            <div class="container-fluid p-0">
                <div class="mb-3">
                    <h5 class="h5 d-inline align-middle">DACH SÁCH TÀI LIỆU ĐÃ UPLOAD</h5>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ngày đăng</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <?php
                    if ($selectAll->num_rows > 0) {
                        while ($result = $selectAll->fetch_assoc()) {
                    ?>

                            <tr>
                                <td><?php echo $result['docId'] ?></td>
                                <td><?php echo $result['docName'] ?></td>
                                <td><?php echo $result['docDate'] ?></td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $result['docDes'] ?></td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $result['docCon'] ?></td>
                                <td>
                                    <a class="badge bg-success" href="docEdit.php?docId=<?php echo $result['docId'] ?>">Sửa</a>


                                    <a class="badge bg-danger" onclick="removeRow(docId=<?php echo $result['docId'] ?>,url='docDelete.php')" href="#">Xóa</a>
                                </td>

                            </tr>

                    <?php
                        }
                    }
                    ?>
                    <?php ?>
                </table>
            </div>
    </div>
    </main>
    </div>
    <footer>
        <?php
        include 'part/footer.php';
        ?>
    </footer>
    <script>
        function removeRow(docId, url) {
            if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                event.preventDefault();
                $.ajax({
                    url: url,
                    data: {
                        docId
                    },
                    method: 'GET',
                    dataType: 'JSON',
                    success: function(res) {
                        console.log(res);

                        if (res.success == true) {
                            location.reload();
                        } else {
                            alert('Xóa thất bại');
                        }
                    }
                })
            }
        }
    </script>



</body>

</html>