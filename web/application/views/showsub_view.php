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
				<a class="nav-link" href="<?php echo base_url(); ?>">Show list<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin/maintain');?>">Maintenance</a>
			</li>
			</ul>
		</div>
	</nav>
	
	<?php echo br(3);?>

	
<div class="container">

	<h4>Show list data</h4>

	<div class="row">
    	<div class="col" >
			<a href="<?php echo base_url('Showlist/addsub?id=' . $tid);?>" class="btn btn-info" role="button" style="float:right" name="Addequipment">Add equipment</a>
			<a href="<?php echo base_url(''); ?>" class="btn btn-link" role="button" style="float:right" name="Addequipment">Back</a>
		</div>
	</div>


	<?php echo br(1);?>

	<!--table list-->
	<table class="table table-bordered">
	<thead>
		<tr>
		<th scope="col">No.</th>
		<th scope="col">Name</th>
		<th scope="col">Is Rentable?</th>
		<th scope="col">Edit</th>
		<th scope="col">Delete</th>
		<th scope="col">List</th>
		</tr>
	</thead>
	
		<tbody>
		<?php foreach ($query as $rows) {?>
			<tr>
				<td><?php echo $rows['devicesub_id'];?></td>
				<td><?php echo $rows['devicesub_name'];?></td>
				<td><?php echo ($rows['devicesub_rentable'] == 1 ? 'true' : 'false');?></ts>
				<td><a href="<?php echo base_url('Showlist/editsub?id='.$rows['devicesub_id']);?>" type="button" class="btn btn-warning btn-sm" name="edit">Edit</a></td>
				<td><a type="button" class="btn btn-danger btn-sm" href="<?=base_url("Showlist/deletesub/".$rows['devicesub_id'])?>">Delete</a></td>
				<td><a class="btn btn-primary btn-sm" href="<?=base_url('Showlist/list/'.$rows['devicesub_id'])?>">View List</a></td>
			</tr>
			<?php } ?>
		</tbody>
	
	</table>

</div>

</body>
</html>