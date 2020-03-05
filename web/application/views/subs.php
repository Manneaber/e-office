<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container" style="margin-top: 15px;">
  <button class="btn btn-success float-right" style="margin-bottom: 15px;" data-toggle="modal" data-target="#addModel">
    เพิ่มครุภัณฑ์ใหม่
  </button>
  <table class="table">
    <thead class="thead-color">
      <tr style="color: aliceblue">
        <th scope="col" width="127px">รหัสครุภัณฑ์</th>
        <th scope="col">ลักษณะ</th>
        <th scope="col" width="112px">สถานะการยืม</th>
        <th scope="col" width="112px">สิทธิการยืม</th>
        <th scope="col" width="112px">ตำแหน่งที่ตั้ง</th>
        <th scope="col" width="230px">หมายเหตุ</th>
        <th scope="col" width="140px">การจัดการ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($details as $detail) {
        echo "<tr>
                <th scope='row'><a href='" . base_url('devicedetail/') . $detail->list_id . "'>คพ." . str_replace("_", "/", $detail->list_id) . "</a></th>
                <td>$detail->list_spec</td>
                <td>$detail->list_status_str</td>
                <td>$detail->list_permission_str</td>
                <td>$detail->list_location</td>
                <td>$detail->list_note</td>
                <td>
                    <button class='btn btn-warning' data-toggle='modal' data-target='#editModel$detail->list_id'><img src='" . base_url('static/app/img/white-gear-icon-png-12.png') . "' class='size-logo rounded-circle ' alt='edit'></button>
                    <a href='" . base_url('devicesub/hide/' . $sub_id . "/" . $detail->list_id) . "' class='btn btn-danger'><img src='" . base_url('static/app/img/trash-2-xxl.png') . "' class='size-logo rounded-circle ' alt='remove'></a>
                </td>
            </tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModelLabel">เพิ่มครุภัณฑ์ใหม่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('devicesub/add') ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="listid" class="col-form-label">รหัสครุภัณฑ์:</label>
            <input type="text" class="form-control" name="listid" required>
          </div>
          <div class="form-group">
            <label for="spec" class="col-form-label">คุณสมบัติครุภัณฑ์*:</label>
            <textarea type="text" class="form-control" name="spec" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="location" class="col-form-label">ตำแหน่งที่ตั้ง:</label>
            <input type="text" class="form-control" name="location">
          </div>
          <div class="form-group">
            <label for="note" class="col-form-label">หมายเหตุ:</label>
            <textarea type="text" class="form-control" name="note" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">สถานะการยืม:</label>
            <select class="form-control" name="status">
              <option value="0">สามารถยืมได้</option>
              <option value="1">ไม่สามารถยืมได้เนื่องจากกำลังถูกยืม</option>
              <option value="2">ไม่สามารถยืมได้เนื่องจากถูกจอง</option>
              <option value="3">ไม่สามารถยืมได้เนื่องจากชำรุด หรือกำลังซ่อมบำรุง</option>
              <option value="4">ไม่สามารถยืมได้เนื่องจากไม่ใช่อุปกรณ์ที่ยืมได้</option>
            </select>
          </div>
          <div class="form-group">
            <label for="perm" class="col-form-label">สิทธิการยืม:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="perm1" value="1">
              <label class="form-check-label" for="perm1">นักศึกษา</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="perm2" value="2">
              <label class="form-check-label" for="perm2">อาจารย์</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="perm3" value="4">
              <label class="form-check-label" for="perm3">เจ้าหน้าที่</label>
            </div>
          </div>
          <input type="text" value="<?= $sub_id ?>" name="subid" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
foreach ($details as $detail) {
  $c1 = false;
  $c2 = false;
  $c3 = false;

  if ($detail->list_permission != 0) {
    $perm = $detail->list_permission;
    if ($perm >= 4) {
      $perm -= 4;
      $c3 = true;
    }
    if ($perm >= 2) {
      $perm -= 2;
      $c2 = true;
    }
    if ($perm >= 1) {
      $perm -= 1;
      $c1 = true;
    }
  }

  echo "<div class='modal fade' id='editModel$detail->list_id' tabindex='-1' role='dialog' aria-labelledby='addModelLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='addModelLabel'>แก้ไขครุภัณฑ์ - $detail->list_id</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <form method='post' action='" . base_url('devicesub/edit') . "'>
          <div class='modal-body'>
          <input type='text' class='form-control' name='listid' value='$detail->list_id' hidden>
            <div class='form-group'>
              <label for='spec' class='col-form-label'>คุณสมบัติครุภัณฑ์*:</label>
              <textarea type='text' class='form-control' name='spec' rows='5'>$detail->list_spec</textarea>
            </div>
            <div class='form-group'>
              <label for='location' class='col-form-label'>ตำแหน่งที่ตั้ง:</label>
              <input type='text' class='form-control' name='location' value='$detail->list_location'>
            </div>
            <div class='form-group'>
              <label for='note' class='col-form-label'>หมายเหตุ:</label>
              <textarea type='text' class='form-control' name='note' rows='2'>$detail->list_note</textarea>
            </div>
            <div class='form-group'>
              <label for='status' class='col-form-label'>สถานะการยืม:</label>
              <select class='form-control' name='status'>
                <option value='0' " . ($detail->list_status == 0 ? "selected='selected'" : "") . ">สามารถยืมได้</option>
                <option value='1' " . ($detail->list_status == 1 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากกำลังถูกยืม</option>
                <option value='2' " . ($detail->list_status == 2 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากถูกจอง</option>
                <option value='3' " . ($detail->list_status == 3 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากชำรุด หรือกำลังซ่อมบำรุง</option>
                <option value='4' " . ($detail->list_status == 4 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากไม่ใช่อุปกรณ์ที่ยืมได้</option>
              </select>
            </div>
            <div class='form-group'>
              <label for='perm' class='col-form-label'>สิทธิการยืม:</label>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='checkbox' name='perm1' value='1' " . ($c1 ? "checked" : "") . ">
                <label class='form-check-label' for='perm1'>นักศึกษา</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='checkbox' name='perm2' value='2' " . ($c2 ? "checked" : "") . ">
                <label class='form-check-label' for='perm2'>อาจารย์</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='checkbox' name='perm3' value='4' " . ($c3 ? "checked" : "") . ">
                <label class='form-check-label' for='perm3'>เจ้าหน้าที่</label>
              </div>
            </div>
            <input type='text' value='$sub_id' name='subid' hidden>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
            <button type='submit' class='btn btn-primary'>แก้ไข</button>
          </div>
        </form>
      </div>
    </div>
  </div>";
}
?>