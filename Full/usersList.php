<?php
include 'part/header.php';
include 'class/usersClass.php';
$usersClass = new usersClass;
?>
<?php
$selectAll = $usersClass->select_users_All();
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
                    <h5 class="h5 d-inline align-middle">DACH SÁCH TÀI KHOẢN HIỆN CÓ</h5>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Tài Khoản</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mật Khẩu</th>
                            <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <?php
                    if ($selectAll->num_rows > 0) {
                        while ($result = $selectAll->fetch_assoc()) {
                    ?>

                            <tr>
                                <td><?php echo $result['usersId'] ?></td>
                                <td><?php echo $result['usersName'] ?></td>
                                <td><?php echo $result['usersEm'] ?></td>
                                <td><?php echo $result['usersPw'] ?></td>


                                <td>
                                    <a class="badge bg-success" href="usersEdit.php?usersId=<?php echo $result['usersId'] ?>">Sửa thông tin</a>


                                    <a class="badge bg-danger" onclick="removeRow(usersId=<?php echo $result['usersId'] ?>,url='usersDelete.php')" href="#">Xóa tài khoản</a>
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
        function removeRow(usersId, url) {
            if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                event.preventDefault();
                $.ajax({
                    url: url,
                    data: {
                        usersId
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