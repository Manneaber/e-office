<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add new type of Computer equipments.</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Show list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/maintain'); ?>">Maintenance</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php echo br(2); ?>


    <!-- insert data to subject table-->

    <div class="container">

        <h4>Add equipment type</h4>
        <br>

        <form action="<?php echo base_url('Showlist_type/add/post'); ?>" method="post">
            <div class="form-group row">
                <label for="typename" class="col-sm-2 col-form-label">Type Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="typename" name="typename" placeholder="Type name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="rentable" class="col-sm-2 col-form-label">Is Rentable?</label>
                <div class="col-sm-10">
                    <select class="form-control" name="rentable" id="rentable" required>
                        <option value="1">Rentable</option>
                        <option value="0">Unrentable</option>
                    </select>
                </div>
            </div>

            <?php echo br(2); ?>
            <button type="submit" class="btn btn-success" style="float:right" name="submit">Submit</button>
        </form>

        <?php echo br(6); ?>
        <a class="btn btn-dark" name="back" href="<?php echo base_url(); ?>" role="button">Back</a>


    </div>

</body>

</html>