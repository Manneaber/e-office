<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="fluid-container">
  <div class="row" style="margin-top: 30px;">
    <div class="col-lg-8 col-md-7 col-sm-12">
      <h2 style="margin-bottom: 3rem;">Pending</h2>
      <div class="list-title">
        <div class="row">
          <div class="col-1"><b>#</b></div>
          <div class="col">Device ID</div>
          <div class="col">Device Name</div>
          <div class="col">Symptom</div>
          <div class="col">Location</div>
        </div>
      </div>
      <div id="pendingList" class="list-group">
        <?php
        for ($i = 0; $i < sizeof($opening); $i++) {
          echo '<div class="row list-group-item" data-id="' . $opening[$i]['req_id'] . '">';
          echo '	<div class="col-1"><b>' . $opening[$i]['req_id'] . '</b></div>';
          echo '	<div class="col">' . $opening[$i]['req_deviceid'] . '</div>';
          echo '	<div class="col">' . $opening[$i]['devicesub_name'] . '</div>';
          echo '	<div class="col">' . $opening[$i]['req_symptom'] . '</div>';
          echo '	<div class="col hidden">' . $opening[$i]['req_location'] . '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="col-lg-4 col-md-5 col-sm-12" id="sticky">
      <h2 style="margin-bottom: 3rem;">Completed</h2>
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
          echo '	<div class="col hidden">' . $closed[$i]['req_location'] . '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('/static/Sortable.min.js') ?>"></script>
<script src="<?= base_url('/static/jquery-confirm.min.js') ?>"></script>
<script>
  var updateURL = "<?= base_url('/admin/maintain/close') ?>";
  var priorityURL = "<?= base_url('/admin/maintain/priority') ?>";

  var pendingList = document.getElementById('pendingList');
  var doneList = document.getElementById('doneList');

  Sortable.create(doneList, {
    group: 'shared',
    ghostClass: 'red-background-class',
    sort: false,
    animation: 150,
    onEnd: function( /**Event*/ evt) {
      var itemEl = evt.item; // dragged HTMLElement
      evt.to; // target list
      evt.from; // previous list
      evt.oldIndex; // element's old index within old parent
      evt.newIndex; // element's new index within new parent
      evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
      evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
      evt.clone // the clone element
      evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
    },
    onMove: function( /**Event*/ evt, /**Event*/ originalEvent) {
      return false;
    },
  });

  Sortable.create(pendingList, {
    group: 'shared',
    ghostClass: 'blue-background-class',
    animation: 150,
    scroll: true,
    scrollSensitivity: 50,
    scrollSpeed: 10,
    bubbleScroll: true,
    dataIdAttr: 'data-id',
    onEnd: function( /**Event*/ evt) {
      var itemEl = evt.item; // dragged HTMLElement
      evt.to; // target list
      evt.from; // previous list
      evt.oldIndex; // element's old index within old parent
      evt.newIndex; // element's new index within new parent
      evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
      evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
      evt.clone // the clone element
      evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving

      if (evt.from !== evt.to) {
        $.confirm({
          title: 'การยืนยัน',
          content: 'ต้องการปิดงานซ่อมบำรุงนี้หรือไม่',
          autoClose: 'ยกเลิก|10000',
          buttons: {
            ปิดงาน: function() {
              $.alert({
                content: function() {
                  var self = this;
                  return $.ajax({
                    url: updateURL,
                    dataType: 'json',
                    method: 'POST',
                    data: {
                      ticID: itemEl.getAttribute('data-id')
                    },
                    contentType: "application/x-www-form-urlencoded"
                  }).done(function(response) {
                    if (response.code != 200) {
                      evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
                    }

                    self.setContent("ปิดงานซ่อมบำรุงแล้วเรียบร้อย");
                    self.setTitle("สำเร็จ");
                  }).fail(function() {
                    self.setTitle("มีบางอย่างผิดพลาด");
                    self.setContent('ไม่สามารถปิดงานซ่อมบำรุงได้');
                    evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
                  });
                }
              });
            },
            ยกเลิก: function() {
              // move back
              evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
            }
          }
        });
      } else {
        $.ajax({
          url: priorityURL,
          dataType: 'json',
          method: 'POST',
          data: {
            arr: JSON.stringify(this.toArray()),
          },
          contentType: "application/x-www-form-urlencoded"
        }).done(function(response) {
          if (response.code != 200) {
            evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
            $.alert({
              title: "มีบางอย่างผิดพลาด",
              content: 'ไม่สามารถจัดความสำคัญงานได้'
            });
          }
        }).fail(function() {

          $.alert({
            title: "มีบางอย่างผิดพลาด",
            content: 'ไม่สามารถจัดความสำคัญงานได้'
          });

          evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
        });
      }
    },
  });

  window.onscroll = function() {
    myFunction()
  };

  var navbar = document.getElementById("sticky");

  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("fixed-top")
    } else {
      navbar.classList.remove("fixed-top");
    }
  }
</script>