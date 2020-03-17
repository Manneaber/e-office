<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="fluid-container">
  <div class="row" style="margin-top: 30px;">
    <div class="col-lg-8 col-md-7 col-sm-12">
      <h2 style="margin-bottom: 3rem;">รายการแจ้งซ่อม</h2>
      <div class="list-title">
        <div class="row">
          <div class="col-1"><b>#</b></div>
          <div class="col">รหัส</div>
          <div class="col">สเปค</div>
          <div class="col">อาการ</div>
          <div class="col">ตำแหน่ง</div>
          <div class="col">ความเร่งด่วน</div>
        </div>
      </div>
      <div id="pendingList" class="list-group">
        <?php
        for ($i = 0; $i < sizeof($opening); $i++) {
          echo '<div class="row list-group-item" data-id="' . $opening[$i]['req_id'] . '">';
          echo '	<div class="col-1"><b>' . $opening[$i]['req_id'] . '</b></div>';
          echo '	<div class="col">' . $opening[$i]['req_deviceid'] . '</div>';
          echo '	<div class="col">' . $opening[$i]['list_spec'] . '</div>';
          echo '	<div class="col">' . $opening[$i]['req_symptom'] . '</div>';
          echo '	<div class="col hidden-done">' . $opening[$i]['req_location'] . '</div>';
          echo '	<div class="col hidden-done">' . $opening[$i]['req_userpriority'] . '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="col-lg-4 col-md-5 col-sm-12" id="sticky">
      <h2 style="margin-bottom: 3rem;">เสร็จสิ้น</h2>
      <div class="list-title">
        <div class="row">
          <div class="col-1"><b>#</b></div>
          <div class="col">Device ID</div>
          <div class="col">Device Name</div>
          <div class="col">Symptom</div>
          <div class="col hidden">Location</div>
        </div>
      </div>
      <div id="doneList" class="list-group">
        <?php
        for ($i = 0; $i < sizeof($closed); $i++) {
          echo '<div class="row list-group-item" data-id="' . $closed[$i]['req_id'] . '">';
          echo '	<div class="col-1"><b>' . $closed[$i]['req_id'] . '</b></div>';
          echo '	<div class="col">' . $closed[$i]['req_deviceid'] . '</div>';
          echo '	<div class="col">' . $closed[$i]['devicesub_name'] . '</div>';
          echo '	<div class="col">' . $closed[$i]['req_symptom'] . '</div>';
          echo '	<div class="col hidden-done">' . $closed[$i]['req_location'] . '</div>';
          echo '	<div class="col hidden-done">' . $opening[$i]['req_userpriority'] . '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
