<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Maintain</title>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Sarabun&display=swap');
	</style>
	<link rel="stylesheet" href="<?= base_url('/static/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/static/bootstrap-grid.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/static/bootstrap-reboot.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/static/jquery-confirm.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/static/style.css') ?>">

	<script src="<?= base_url('/static/jquery-3.4.1.min.js') ?>"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>

	<div class="fluid-container">
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-8 col-md-7 col-sm-12">
				<h2 style="margin-bottom: 3rem;">Pending</h2>
				<div class="list-title">
					<div class="row">
						<div class="col-1"><b>#</b></div>
						<div class="col">Device ID</div>
						<div class="col">Device Name</div>
						<div class="col">Symptom</div>
						<div class="col">Location</div>
					</div>
				</div>
				<div id="pendingList" class="list-group">
					<?php
					for ($i = 0; $i < sizeof($opening); $i++) {
						echo '<div class="row list-group-item" data-id="' . $opening[$i]['req_id'] . '">';
						echo '	<div class="col-1"><b>' . $opening[$i]['req_id'] . '</b></div>';
						echo '	<div class="col">' . $opening[$i]['req_deviceid'] . '</div>';
						echo '	<div class="col">' . $opening[$i]['devicesub_name'] . '</div>';
						echo '	<div class="col">' . $opening[$i]['req_symptom'] . '</div>';
						echo '	<div class="col hidden">SC09</div>';
						echo '</div>';
					}
					?>
				</div>
			</div>

			<div class="col-lg-4 col-md-5 col-sm-12" id="sticky">
				<h2 style="margin-bottom: 3rem;">Completed</h2>
				<div class="list-title">
					<div class="row">
						<div class="col-1"><b>#</b></div>
						<div class="col">Device ID</div>
						<div class="col">Device Name</div>
						<div class="col">Symptom</div>
						<div class="col hidden">Location</div>
					</div>
				</div>
				<div id="doneList" class="list-group">
					<?php
					for ($i = 0; $i < sizeof($closed); $i++) {
						echo '<div class="row list-group-item" data-id="' . $closed[$i]['req_id'] . '">';
						echo '	<div class="col-1"><b>' . $closed[$i]['req_id'] . '</b></div>';
						echo '	<div class="col">' . $closed[$i]['req_deviceid'] . '</div>';
						echo '	<div class="col">' . $closed[$i]['devicesub_name'] . '</div>';
						echo '	<div class="col">' . $closed[$i]['req_symptom'] . '</div>';
						echo '	<div class="col hidden">SC09</div>';
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('/static/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('/static/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('/static/Sortable.min.js') ?>"></script>
	<script src="<?= base_url('/static/jquery-confirm.min.js') ?>"></script>
	<script>
		var updateURL = "<?= base_url('/admin/maintain/close') ?>";
		var priorityURL = "<?= base_url('/admin/maintain/priority') ?>";
	</script>
	<script src="<?= base_url('/static/app.js') ?>"></script>
</body>

</html>