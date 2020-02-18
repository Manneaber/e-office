<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Show list of Computer equipments.</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Computer equipment</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url(); ?>">Show list<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/maintain'); ?>">Maintenance</a>
				</li>
			</ul>
		</div>
	</nav>

	<?php echo br(3); ?>


	<div class="container">

		<h4><?= $device_name ?></h4>

		<div class="row">
			<div class="col">
				<form action="<?php echo base_url('showlist/adddevice'); ?>" method="post">
					<input type="text" value="<?= $devicesub_id ?>" id="subid" name="subid" hidden>
					<button class="btn btn-info" role="button" style="float:right" name="Addequipment" type="submit">Add Device</button>
				</form>
				<a href="<?php echo base_url('showlist?typeid=' . $devicesub_id); ?>" class="btn btn-link" role="button" style="float:right" name="Addequipment">Back</a>
			</div>
		</div>


		<?php echo br(1); ?>

		<!--table list-->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Device ID</th>
					<th scope="col">Is available?</th>
					<th scope="col">Is Locked?</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($device_list as $rows) {
				?>
					<tr>
						<td><?php echo $rows['device_id']; ?></td>
						<td><?php echo ($rows['device_status'] == 0 ? 'true' : 'false'); ?></td>
						<td><?php echo ($rows['device_lock'] == 1 ? 'true' : 'false'); ?></td>
						<td><a href="<?php echo base_url('showlist/editdevice' . $rows['device_id']); ?>" type="button" class="btn btn-warning btn-sm" name="edit">Edit</a></td>
						<td><a class="btn btn-danger btn-sm" href="<?= base_url('showlist/remove/' . $rows['device_id']) ?>">Delete</a></td>
					</tr>
				<?php } ?>
			</tbody>

		</table>

		<!--show model popup when click delete button-->
		<div class="modal fade" id="showModelPopupDelete" tabindex="-1" role="dialog" aria-labelledby="showModelPopupDeleteLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="showModelPopupDeleteLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Do you want to delete equipment?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-primary">Yes</button>
					</div>
				</div>
			</div>
		</div>



	</div>

</body>

</html>