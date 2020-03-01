<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div id="container-fluid">
	<div class="row">
		<div class="col-md-3 col-lg-2 d-none d-sm-none d-md-block side-nav-top">
			<div class="logo-img">
				<img src="https://cdn.shopify.com/shopifycloud/hatchful-web/assets/5332ffcb554a06a5ecd7351a5309f011.svg" draggable="false" />
			</div>
		</div>
		<div class="col-md-9 col-lg-10 top-nav">
			<div class="row" style="height: 100%;">
				<div class="col" style="height: 100%;">
					<div class="top-nav-row float-left">
						<ol class="breadcrumb">
							<?= $path ?>
						</ol>
					</div>
				</div>
				<div class="col-auto" style="height: 100%;">
					<div class="top-nav-row float-right" style="width:60px;">
						<div class="dropdown">
							<a class="user rounded-circle" type="button" id="userActionDropdown">
								<img src="<?= base_url('/static/app/img/user.png') ?>" width="30px" draggable="false">
							</a>
							<div class="dropdown-menu-c hidden" id="userActionDropdown">
								<h6 class="dropdown-header">Tinta Chanakan Tippochana</h6>
								<a class="dropdown-item" href="#">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Logout</a>
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
					<a href="#">
						<div class="icon-img rounded-circle"></div>
						<div class="title">หน้าหลัก</div>
						<div class="action">></div>
					</a>
				</li>
				<li class="list-group-item">
					<a href="#">
						<div class="icon-img rounded-circle"></div>
						<div class="title">คลัง</div>
						<div class="action">></div>
					</a>
				</li>
				<li class="list-group-item">
					<a href="#">
						<div class="icon-img rounded-circle"></div>
						<div class="title">ซ่อมบำรุง</div>
						<div class="action">></div>
					</a>
				</li>
				<li class="list-group-item">
					<a href="#">
						<div class="icon-img rounded-circle"></div>
						<div class="title">ผู้ใช้บริการ</div>
						<div class="action">></div>
					</a>
				</li>
			</ul>
		</div>
		<div class="col-md-9 col-lg-10 body">
			<div style="overflow-y: scroll;">
				<?= $body ?>
			</div>
		</div>
	</div>
</div>