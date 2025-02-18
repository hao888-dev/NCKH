<?php
include 'part/header.php';
include 'class/usersClass.php';
$usersClass = new usersClass;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$data = $_POST;
	$insert_users = $usersClass->insert_users($data);
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
									<div class="m-mb-3">
										<div class="mb-3">
											<label class="form-label">Tên tài khoản</label>
											<input class="form-control form-control-lg" type="text" name="usersName" placeholder="Nhập tên" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="usersEm" placeholder="Nhập email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mật khẩu</label>
											<input class="form-control form-control-lg" type="password" name="usersPw" placeholder="Nhập mật khẩu" />
										</div>
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




	<script src="static/js/app.js"></script>

</body>

</html>