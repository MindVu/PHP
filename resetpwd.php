<!DOCTYPE html>
<html lang="en">

<head>
<title>Đặt lại mật khẩu</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Material Design for Bootstrap</title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="css/mdb.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<style>
		.gradient-custom-3 {
			background: rgb(74,139,223);
background: radial-gradient(circle, rgba(74,139,223,1) 0%, rgba(6,6,64,1) 0%);
		}

	</style>
</head>

<body>
	<!-- Start your project here-->
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-9 col-lg-7 col-xl-6">
					<div class="card" style="border-radius: 15px;">
						<div class="card-body p-5">
							<h2 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;font-weight: 900;color:black;">
								Đặt lại mật khẩu</h2>
								<?php
                if (isset($_SESSION['error'])) {
                  echo $_SESSION['error'];
                  $_SESSION['error']=NULL;
                }
                ?>
                </div>
                <div class="" style="color:green;font-weight: bold;">
                <?php
                if (isset($_SESSION['success'])) {
                  echo $_SESSION['success'];
                  $_SESSION['success']=NULL;
                }
                ?>
							<form action="includes/resetpwd.inc.php" method="post">
								<div class="form-outline mb-4">
									<input type="text" name="id" id="form3Example4cg" class="form-control form-control-lg" />
									<label class="form-label" for="form3Example4cg">Mã giáo viên</label>
								</div>
								<div class="d-flex justify-content-center">
									<button type="submit" class="btn btn-dark btn-lg btn-block" name="resetpwd-submit">Xác nhận</button>
								</div>
								<p class="text-center text-muted mt-5 mb-0">Hoặc <a href="index.php" class="fw-bold text-body"><u>Trở về đăng nhập</u></a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End your project here-->

	<!-- MDB -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
	<!-- Custom scripts -->
	<script type="text/javascript"></script>
</body>

</html>