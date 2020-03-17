<body>
    <div class="container">
        <div class="intro"><br>
            <h2 class="text-center"><strong>แจ้งซ่อมครุภัณฑ์</strong></h2>
            <p class="text-center">คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น<br></p>
            <p class="text-center">Faculty of Science,&nbsp;Khon Kaen&nbsp;University<br></p>
        </div>
        <div class="col mb-3">
            <form action="<?= base_url('Repair/add_repair') ?>" method="post">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ประเภทครุภัณฑ์ : </label>
                    <div class="col-sm-10">
                        <select name="device_type" id="device_type" class="custom-select">
                            <option value="">เลือกประเภทของครุภัณฑ์</option>
                            <?php
                            foreach ($device_type as $row) {
                                echo '<option value="' . $row->type_id . '">' . $row->type_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายการครุภัณฑ์ : </label>
                    <div class="col-sm-10">
                        <select name="device_sub" id="device_sub" class="custom-select" required>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รหัสครุภัณฑ์ : </label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="device_list" id="device_list" required>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">สถานที่ : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBreakdown" class="col-sm-2 col-form-label">อาการ : </label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="inputBreakdown" name="inputBreakdown"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ความเร่งด่วนของการซ่อม : </label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="priority" name="priority" required>
                            <option selected value="">เลือกความเร่งด่วนของการซ่อม</option>
                            <option value="1">น้อย</option>
                            <option value="2">ปานกลาง</option>
                            <option value="3">มาก</option>
                            <option value="4">มากที่สุด</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row float-right">
                    <a href="<?= base_url('Repair') ?>"> <button type="button" class="btn btn-outline-danger ">ยกเลิก</button> </a>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-outline-success">ตกลง</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#device_type').change(function() {
                var sub_type = $('#device_type').val();
                // alert(device_type_id);

                if (sub_type != '') {
                    $.ajax({
                        url: "<?= base_url(); ?>Repair/fetch_device_sub",
                        method: "POST",
                        data: {
                            sub_type: sub_type
                        },
                        success: function(data) {
                            $('#device_sub').html(data);

                        }
                    });
                } else {
                    $('#device_sub').html('');
                    $('#device_list').html('');
                }

            });

            $('#device_sub').change(function() {
                var list_id = $('#device_sub').val();
                if (list_id != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Repair/fetch_device_list",
                        method: "POST",
                        data: {
                            list_id: list_id
                        },
                        success: function(data) {
                            $('#location').html('');
                            $('#device_list').html(data);
                        }
                    });
                } else {
                    $('#device_list').html('');
                }
            });

            $('#device_list').change(() => {
                var list_id = $('#device_list').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>Repair/device_list_location",
                    method: "POST",
                    data: {
                        list_id: list_id
                    },
                    success: (data) => {
                        $('#location').val(data);
                    }
                });
            });
        });
    </script>
</body>