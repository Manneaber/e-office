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

        <h4>Add Computer equipment</h4>
        <br>

        <form action="<?php echo base_url('showlist/adddevice/post'); ?>" method="post">
            <input type="text" value="<?= $subid ?>" name="subid" id="subid" hidden>
            <div class="form-group row">
                <label for="deviceid" class="col-sm-2 col-form-label">Device ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deviceid" name="deviceid" placeholder="Device ID" required>
                </div>
            </div>

            <?php echo br(2); ?>
            <button type="submit" class="btn btn-success" style="float:right" name="submit">Submit</button>
        </form>

        <?php echo br(6); ?>
        <a class="btn btn-dark" name="back" href="<?php echo base_url('showlist/list/' . $subid); ?>" role="button">Back</a>


    </div>

</body>

</html>