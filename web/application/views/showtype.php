<body>
    <div class="container">
        <div class="intro"><br>
            <h2 class="text-center"><strong>ประเภทของครุภัณฑ์</strong></h2>
            <p class="text-center">คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น<br></p>
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center">Faculty of Science,&nbsp;Khon Kaen&nbsp;University<br></p>
        </div>
        <div class="but-increase" style="margin-bottom: 15px;">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">เพิ่มประเภทของครุภัณฑ์</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทของครุภัณฑ์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('Showtype/add_type')?>" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รหัสประเภทของครุภัณฑ์:</label>
                        <input type="text" class="form-control" id="type_id" name="type_id" required pattern="[0-9]{2}">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ประเภทของครุภัณฑ์:</label>
                        <textarea class="form-control" id="type_name" name="type_name" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button id="close" name="close" type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button id="submit" name="submit" type="submit" class="btn btn-primary">ตกลง</button>
                    </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3">

        <?php
            foreach ($query as $row) {
        ?>
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?=  $row->type_id; ?></h5>
                    <a href="<?= base_url('device/' . $row->type_id )?>" name="...">
                    <p class="card-text"><?= $row->type_name; ?></p>
                    </a>

                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#message<?=$row->type_id;?>">แก้ไข</button>

                    <div id="message<?=$row->type_id;?>"  class="modal fade" role="dialog" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทของครุภัณฑ์</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url('Showtype/update')?>" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">รหัสประเภทของครุภัณฑ์:</label>
                                    <label type="text" class="form-control" id="type_id" required pattern="[0-9]{2}" name="type_id"><?=$row->type_id;?></label>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">ประเภทของครุภัณฑ์:</label>
                                    <textarea class="form-control" id="type_name" name="type_name" required><?=$row->type_name;?></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button id="close" name="close" type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button id="submit" name="submit" type="submit" class="btn btn-primary">ตกลง</button>
                                </div>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    <a href="<?= base_url('Showtype/delete/' . $row->type_id ) ?>"  type="button" class="btn btn-outline-danger" name="delete">ลบ</a>                    
                </div>
            </div>
        </div>
        <?php  }   ?>
            
</body>