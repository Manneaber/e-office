<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login</title>

	<link rel="stylesheet" href="<?= base_url('/static/bootstrap-4.4.1-dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/static/app/css/style.css') ?>">
</head>

<body>
	<?php
	if (isset($err)) {
		echo "<div class='alert alert-danger alert-dismissible fade show' style='position: fixed; top: 15px; left:15px; right:15px;' role='alert'>
		<strong>เกิดข้อผิดพลาด</strong> $err
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
	</div>";
	}
	?>
	<div class='Login'>
		<div class='container-fluid'>
			<div class='loginContainer'>
				<div class='Logo'>
					<img class='logo' src="<?= base_url('static/app/img/logo.png') ?>" draggable=false />
				</div>
				<br>
				<form method="POST" action="<?= base_url('auth/submitLogin') ?>">
					<div class='form-group'>
						<label for='usernameInput'>ชื่อผู้ใช้</label>
						<input type='text' class='form-control' name='username' id='usernameInput' placeholder='กรอกชื่อผู้ใช้ของคุณ' required />
					</div>
					<div class='form-group'>
						<label for='passwordInput'>รหัสผ่าน</label>
						<input type='password' class='form-control' name='password' id='passwordInput' placeholder='กรอกรหัสผ่านของคุณ' required />
					</div>
					<br>
					<button type='submit' class='btn btn-primary'>เข้าสู่ระบบ</button>
				</form>
			</div>
		</div>
		<div class='area'>
			<ul class='circles'>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>

	<script src="<?= base_url('/static/jquery/jquery-3.4.1.min.js') ?>"></script>
	<script src="<?= base_url('/static/bootstrap-4.4.1-dist/js/bootstrap.bundle.js') ?>"></script>
</body>

</html>