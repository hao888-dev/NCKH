<?php
include 'part/header.php';
include 'class/dictoryClass.php';
$dictoryClass = new DirectoryClass;
?>
<?php
$selectAll = $dictoryClass->select_dictory_All();
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
                    <h5 class="h5 d-inline align-middle">DACH SÁCH THƯ MỤC</h5>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <?php
                    if ($selectAll->num_rows > 0) {
                        while ($result = $selectAll->fetch_assoc()) {
                    ?>

                            <tr>
                                <td><?php echo $result['dictoryId'] ?></td>
                                <td><?php echo $result['dictoryName'] ?></td>
                                <td>
                                    <a class="badge bg-success" href="dictoryEdit.php?dictoryId=<?php echo $result['dictoryId'] ?>">Sửa</a>


                                    <a class="badge bg-danger" onclick="removeRow(dictoryId=<?php echo $result['dictoryId'] ?>,url='dictoryDelete.php')" href="#">Xóa</a>
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
        function removeRow(dictoryId, url) {
            if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                event.preventDefault();
                $.ajax({
                    url: url,
                    data: {
                        dictoryId
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