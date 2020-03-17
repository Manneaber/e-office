<?php
defined('BASEPATH') or exit('No direct script access allowed');

$perm = $this->Auth_model->check();

?>

<div id="container-fluid">
	<div class="row">
		<div class="col-md-3 col-lg-2 d-none d-sm-none d-md-block side-nav-top">
			<div class="logo-img">
				<img src="<?= base_url('static/app/img/logo.png') ?>" draggable="false" />
			</div>
		</div>
		<div class="col-md-9 col-lg-10 top-nav">
			<div class="row" style="height: 100%;">
				<div class="col" style="height: 100%;">
					<div class="top-nav-row float-left">
						<?php
						if (isset($back)) {
							echo '<a href="' . $back . '" class="btn float-left btn-dark" style="height: 100%; margin-right: 15px; border-radius: 50px;"><</a>';
						}
						?>
						<div class="breadcrumb-main float-left">
							<ol class="breadcrumb">
								<?= $path ?>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-auto" style="height: 100%;">
					<div class="top-nav-row float-right" style="width:60px;">
						<div class="dropdown">
							<a class="user rounded-circle" type="button" id="userActionDropdown">
								<img src="<?= base_url('/static/app/img/user.png') ?>" width="30px" draggable="false">
							</a>
							<div class="dropdown-menu-c hidden" id="userActionDropdown">
								<h6 class="dropdown-header"><?= $this->session->userdata()['name'] ?></h6>
								<a class="dropdown-item" href="#">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-lg-2 d-none d-sm-none d-md-block side-nav">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="<?= base_url('') ?>">
						<div class="icon-img rounded-circle"></div>
						<div class="title">หน้าหลัก</div>
						<div class="action">></div>
					</a>
				</li>
				<?php
				if ($perm == 99) { // $perm != 1 && $perm != 2 && $perm != 3 && $perm != 99
					echo '<li class="list-group-item">
					<a href="' . base_url('showtype') . '">
						<div class="icon-img rounded-circle"></div>
						<div class="title">คลัง</div>
						<div class="action">></div>
					</a>
				</li>';
				}

				if ($perm == 1 || $perm == 2 || $perm == 3) {
					echo '<li class="list-group-item">
					<a href="' . base_url('repair') . '">
						<div class="icon-img rounded-circle"></div>
						<div class="title">แจ้งซ่อม</div>
						<div class="action">></div>
					</a>
				</li>';
				}

				if ($perm == 99) { // $perm != 1 && $perm != 2 && $perm != 3 && $perm != 99
					echo '<li class="list-group-item">
					<a href="' . base_url('repairlist') . '">
						<div class="icon-img rounded-circle"></div>
						<div class="title">รายการแจ้งซ่อม</div>
						<div class="action">></div>
					</a>
				</li>';
				}
				?>
			</ul>
		</div>
		<div class="col-md-9 col-lg-10 body">
			<div style="overflow-y: scroll;">
				<?= $body ?>
			</div>
		</div>
	</div>
</div>