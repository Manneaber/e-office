<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
  <h2 style="margin-bottom: 3rem; margin-top: 15px;">รายการแจ้งซ่อม</h2>
  <div class="list-title">
    <div class="row">
      <div class="col"><b>รหัส</b></div>
      <div class="col"><b>สเปค</b></div>
      <div class="col"><b>อาการ</b></div>
      <div class="col"><b>ตำแหน่ง</b></div>
      <div class="col"><b>ความเร่งด่วน</b></div>
      <div class="col"></div>
    </div>
  </div>
  <div id="pendingList" class="list-group">
    <?php
    for ($i = 0; $i < sizeof($opening); $i++) {
      echo '<div class="row list-group-item" data-id="' . $opening[$i]['req_id'] . '">';
      echo '	<div class="col"><b>' . str_replace('_', '/', $opening[$i]['req_deviceid']) . '</b></div>';
      echo '	<div class="col">' . $opening[$i]['list_spec'] . '</div>';
      echo '	<div class="col">' . $opening[$i]['req_symptom'] . '</div>';
      echo '	<div class="col">' . $opening[$i]['req_location'] . '</div>';
      echo '	<div class="col">' . $opening[$i]['req_userprioritystr'] . '</div>';
      echo '	<div class="col">';
      if ($opening[$i]['list_status'] != 3) {
        echo '<button type="button" class="btn btn-success" onClick="acceptJob(\'' . $opening[$i]['req_deviceid'] . '\')">รับเรื่องซ่อมบำรุง</button>';
      }
      echo '<button type="button" class="btn btn-danger" onClick="closeJob(\'' . $opening[$i]['req_deviceid'] . '\')">ปิดงานซ่อม</button></div>';
      echo '</div>';
    }
    ?>
  </div>
</div>