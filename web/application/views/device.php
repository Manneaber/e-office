<?php
$perm = $this->Auth_model->check();
?>

<div class="container" style="margin-top: 15px;">
    <?php
    if ($perm == 99) {
        echo '<button name="addDevice" id="addDevice" type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom: 15px;">
                        เพิ่มอุปกรณ์
                    </button>';
    }
    ?>
    <table class="table ">
        <thead class="thead-color">
            <tr style="color: aliceblue">
                <th scope="col">รายการ</th>
                <?php
                if ($perm == 99) {
                    echo '<th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $rows) { ?>
                <tr>

                    <td><a href="<?= base_url('devicesub/' . $rows->sub_id) ?>"><?php echo $rows->sub_name; ?></a></td>
                    <?php
                    if ($perm == 99) {
                        echo '<td>
                        <!-- Button  modal edit-->
                        <button type="button" class="btn btn-edit" data-toggle="modal" data-target="#message' . $rows->sub_id . '">
                            <img src="' . base_url('static/app/img/white-gear-icon-png-12.png') . '" class="size-logo rounded-circle " alt="edit">
                        </button>

                    </td>
                    <td>

                        <!-- Button  modal hidden data device sub-->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#messageHidden' . $rows->sub_id . '">
                            <img src="' . base_url('static/app/img/trash-2-xxl.png') . '" class="size-logo rounded-circle " alt="edit">
                        </button>

                    </td>';
                    }
                    ?>
                </tr>

                <!-- Modal edit-->
                <div id="message<?php echo $rows->sub_id; ?>" class="modal fade " role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="editModalLabel" name="editModalLabel">แก้ไขขอุปกรณ์</h5>
                                <button id="closeModal" name="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo base_url('Device/edit_data_sub/'); ?>" method="post">
                                    <div class="form-group row">
                                        <label for="inputNameDevice" class="col-sm-3 col-form-label ">ชื่ออุปกรณ์</label>
                                        <!--<//?php echo $rows->sub_id;?>-->
                                        <div class="col-sm-9 col-form-label">
                                            <input type="text" class="form-control" id="sub_name" name="sub_name" value="<?= $rows->sub_name ?>">
                                        </div>
                                        <input type="hidden" class="form-control" id="sub_id" name="sub_id" value="<?= $rows->sub_id ?>">
                                        <input type="hidden" class="form-control" id="sub_type" name="sub_type" value="<?= $type_id ?>">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button id="close" name="close" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button id="submit" name="submit" type="submit" class="btn btn-success ">บันทึก</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Modal hidden-->
                <div id="messageHidden<?php echo $rows->sub_id; ?>" class="modal fade " role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="editModalLabel" name="editModalLabel">ลบอุปกรณ์</h5>
                                <button id="closeModal" name="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url('Device/hidden_data_sub'); ?>" method="post">

                                <div class="modal-body">
                                    <p style="text-align: center">คุณต้องการลบอุปกรณ์หรือไม่ ?</p>
                                    <input type="hidden" class="form-control" id="sub_name" name="sub_name" value="<?= $rows->sub_name ?>">
                                    <input type="hidden" class="form-control" id="sub_id" name="sub_id" value="<?= $rows->sub_id ?>">
                                    <input type="hidden" class="form-control" id="sub_type" name="sub_type" value="<?= $type_id ?>">
                                    <input type="hidden" class="form-control" id="remove_sub" name="remove_sub" value="<?php echo $rows->remove_sub = 1 ?>">

                                </div>

                                <div class="modal-footer">
                                    <button id="close" name="close" type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
                                    <button id="submit" name="submit" type="submit" class="btn btn-danger ">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>



    <!-- Modal Add Device  into database -->
    <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="addModalLabel" name="addModalLabel">เพิ่มอุปกรณ์</h5>
                    <button id="closeModal" name="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Device/add_device_name'); ?>" method="post">

                        <div class="form-group row">
                            <label for="inputNameDevice" class="col-sm-3 col-form-label ">ชื่ออุปกรณ์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " id="sub_name" name="sub_name" placeholder="เช่น ชุดคอมพิวเตอร์สำหรับโครงการนักศึกษา" required>

                                <!-- input id form type page-->
                                <input type="hidden" class="form-control" id="sub_type" name="sub_type" value="<?= $type_id ?>">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="close" name="close" type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            <button id="save" name="save" type="submit" class="btn btn-success ">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>