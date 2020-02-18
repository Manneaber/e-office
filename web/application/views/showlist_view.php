<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
				<a class="nav-link" href="#">Show list<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>web/index.php/insertdata">Add</a>
			</li>
			</ul>
		</div>
	</nav>
	
	<?php echo br(3);?>

	
<div class="container">

	<h4>Show list data</h4>

	<div class="row">
    	<div class="col" >
			<a href="<?php echo base_url();?>web/index.php/insertdata" class="btn btn-info" role="button" style="float:right" name="Addequipment">Add equipment</a>
		</div>
	</div>


	<?php echo br(1);?>

	<!--table list-->
	<table class="table table-bordered">
	<thead>
		<tr>
		<th scope="col">No.</th>
		<th scope="col">Name</th>
		<th scope="col">Type</th>
		<th scope="col">Repair status</th>
		<th scope="col">Time</th>
		<th scope="col">Edit</th>
		<th scope="col">Delete</th>
		</tr>
	</thead>
	
		<tbody>
		<?php foreach ($query as $rows) {?>
			<tr>
				<td><?php echo $rows->devicesub_id;?></td>
				<td><?php echo $rows->devicesub_name;?></td>
				<td><?php echo $rows->devicesub_type;?></td>
				<td><?php echo $rows->devicesub_rentable;?></td>
				<td><?php echo $rows->create_timestamp;?></td>
				<td><a href="<?php echo base_url();?>web/index.php/insertdata/edit/<?php echo $rows->devicesub_id;?>" class="badge badge-light" name="edit">Edit</a></td>
				<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#showModelPopupDelete">Delete</button></td>
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