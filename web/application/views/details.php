<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container" style="margin-top: 15px;">
  <?php
  $c1 = false;
  $c2 = false;
  $c3 = false;

  if ($details->list_permission != 0) {
    $perm = $details->list_permission;
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

  echo "<input type='text' class='form-control' name='listid' value='$details->list_id' hidden>
  <div class='form-group'>
    <label for='spec' class='col-form-label'>คุณสมบัติครุภัณฑ์:</label>
    <textarea readonly type='text' class='form-control' name='spec' rows='5'>$details->list_spec</textarea>
  </div>
  <div class='form-group'>
    <label for='location' class='col-form-label'>ตำแหน่งที่ตั้ง:</label>
    <input readonly type='text' class='form-control' name='location' value='$details->list_location'>
  </div>
  <div class='form-group'>
    <label for='note' class='col-form-label'>หมายเหตุ:</label>
    <textarea readonly type='text' class='form-control' name='note' rows='2'>$details->list_note</textarea>
  </div>
  <div class='form-group'>
    <label for='status' class='col-form-label'>สถานะการยืม:</label>
    <select disabled class='form-control' name='status'>
      <option value='0' " . ($details->list_status == 0 ? "selected='selected'" : "") . ">สามารถยืมได้</option>
      <option value='1' " . ($details->list_status == 1 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากกำลังถูกยืม</option>
      <option value='2' " . ($details->list_status == 2 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากถูกจอง</option>
      <option value='3' " . ($details->list_status == 3 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากชำรุด หรือกำลังซ่อมบำรุง</option>
      <option value='4' " . ($details->list_status == 4 ? "selected='selected'" : "") . ">ไม่สามารถยืมได้เนื่องจากไม่ใช่อุปกรณ์ที่ยืมได้</option>
    </select>
  </div>
  <div class='form-group'>
    <label for='perm' class='col-form-label'>สิทธิการยืม:</label>
    <div class='form-check form-check-inline'>
      <input disabled class='form-check-input' type='checkbox' name='perm1' value='1' " . ($c1 ? "checked" : "") . ">
      <label class='form-check-label' for='perm1'>นักศึกษา</label>
    </div>
    <div class='form-check form-check-inline'>
      <input disabled class='form-check-input' type='checkbox' name='perm2' value='2' " . ($c2 ? "checked" : "") . ">
      <label class='form-check-label' for='perm2'>อาจารย์</label>
    </div>
    <div class='form-check form-check-inline'>
      <input disabled class='form-check-input' type='checkbox' name='perm3' value='4' " . ($c3 ? "checked" : "") . ">
      <label class='form-check-label' for='perm3'>เจ้าหน้าที่</label>
    </div>
    <div class='form-group'>
    <label for='location' class='col-form-label'>วันที่อัพเดท:</label>
      <input readonly type='text' class='form-control' name='location' value='$details->updated_timestamp'>
    </div>
    <label for='location' class='col-form-label'>วันที่สร้าง:</label>
      <input readonly type='text' class='form-control' name='location' value='$details->created_timestamp'>
    </div>
  </div>";
  ?>
</div>