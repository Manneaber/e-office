<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update of Computer equipments.</title>
</head>
<body>

<!--menu bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Computer equipment</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item ">
				<a class="nav-link" href="<?php echo base_url()?>web/index.php">Show list</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#">Edit</a>
			</li>
			</ul>
		</div>
	</nav>
	
	<?php echo br(2);?>


<!-- insert data to subject table-->
	
<div class="container">

    <h4>Update Computer equipment</h4>
    <br>

    <form action="<?php echo base_url();?>web/index.php/Insertdata/editdata" method="post" >
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="devicesub_name" name="devicesub_name" placeholder="Name of equipments" 
                value="<?php echo $query->devicesub_name;?>">
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <select  class="form-control" id="devicesub_type" name="devicesub_type">
                    <option><?php echo $query->devicesub_type;?></option>
                    <option>2</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Borrowing status</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" id="devicesub_rentable" name="devicesub_rentable" placeholder="Your can input is 0 or 1" 
                    value="<?php echo $query->devicesub_rentable;?>">
            </div>
        </div>
       

        <?php echo br(2);?>

        <input type="hidden" name="devicesub_id" value="<?php echo $query->devicesub_id;?>">
        <button type="submit" class="btn btn-success" style="float:right" name="submit">Submit</button>

    </form>

    <?php echo br(6);?>
    <a class="btn btn-dark" href="<?php echo base_url()?>web/index.php" role="button">Back</a>


</div>

</body>
</html>