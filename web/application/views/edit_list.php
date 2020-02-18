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

        <form action="<?php echo base_url('showlist/editdevice/post'); ?>" method="post">
            <input type="text" value="<?= $device_id ?>" name="deviceid" id="deviceid" hidden>
            <input type="text" value="<?= $device_subjectid ?>" name="subid" id="subid" hidden>
            <div class="form-group row">
                <label for="device_status" class="col-sm-2 col-form-label">Device Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="device_status" id="device_status"  required>
                        <option value="0" <?php if ($device_status == 0) echo "selected"; ?> >Rentable</option>
                        <option value="1" <?php if ($device_status == 1) echo "selected"; ?> >Rented</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="device_lock" class="col-sm-2 col-form-label">Device Lock</label>
                <div class="col-sm-10">
                    <select class="form-control" name="device_lock" id="device_lock" required>
                        <option value="0" <?php if ($device_lock == 0) echo "selected"; ?>>Unlock</option>
                        <option value="1" <?php if ($device_lock == 1) echo "selected"; ?>>Lock</option>
                    </select>
                </div>
            </div>

            <?php echo br(2); ?>
            <button type="submit" class="btn btn-success" style="float:right" name="submit">Submit</button>
        </form>

        <?php echo br(6); ?>
        <a class="btn btn-dark" name="back" href="<?php echo base_url('showlist/list/' . $device_subjectid); ?>" role="button">Back</a>


    </div>

</body>

</html>