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

		<div class="row">
			<div class="col">
				<form action="<?php echo base_url('Showlist_type/add'); ?>" method="post">
					<button class="btn btn-info" role="button" style="float:right" name="Addequipment" type="submit">Add Type</button>
				</form>
			</div>
		</div>

		<br>

		<!--table list-->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Type ID</th>
					<th scope="col">Type Name</th>
					<th scope="col">Is Rentable</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
					<th scope="col">View</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($query as $rows) {
				?>
					<tr>
						<td><?php echo $rows['type_id']; ?></td>
						<td><?php echo $rows['type_name']; ?></td>
						<td><?php echo ($rows['type_rentable'] == 1 ? 'true' : 'false'); ?></td>
						<td><a href="<?php echo base_url('Showlist_type/edit/' . $rows['type_id']); ?>" type="button" class="btn btn-warning btn-sm" name="edit">Edit</a></td>
						<td><a class="btn btn-danger btn-sm" href="<?= base_url('Showlist_type/remove/' . $rows['type_id']) ?>">Delete</a></td>
						<td><a class="btn btn-success btn-sm" href="<?= base_url('Showlist?typeid=' . $rows['type_id']) ?>">View</a></td>
					</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

</body>

</html>
