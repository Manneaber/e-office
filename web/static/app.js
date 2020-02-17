var pendingList = document.getElementById('pendingList');
var doneList = document.getElementById('doneList');

Sortable.create(doneList, {
    group: 'shared',
    ghostClass: 'red-background-class',
    sort: false,
    animation: 150,
    onEnd: function (/**Event*/evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        evt.to;    // target list
        evt.from;  // previous list
        evt.oldIndex;  // element's old index within old parent
        evt.newIndex;  // element's new index within new parent
        evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
        evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
        evt.clone // the clone element
        evt.pullMode;  // when item is in another sortable: `"clone"` if cloning, `true` if moving
    },
    onMove: function (/**Event*/evt, /**Event*/originalEvent) {
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
    onEnd: function (/**Event*/evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        evt.to;    // target list
        evt.from;  // previous list
        evt.oldIndex;  // element's old index within old parent
        evt.newIndex;  // element's new index within new parent
        evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
        evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
        evt.clone // the clone element
        evt.pullMode;  // when item is in another sortable: `"clone"` if cloning, `true` if moving

        if (evt.from !== evt.to) {
            $.confirm({
                title: 'การยืนยัน',
                content: 'ต้องการปิดงานซ่อมบำรุงนี้หรือไม่',
                autoClose: 'ยกเลิก|10000',
                buttons: {
                    ปิดงาน: function () {
                        $.alert({
                            content: function () {
                                var self = this;
                                return $.ajax({
                                    url: updateURL,
                                    dataType: 'json',
                                    method: 'POST',
                                    data: {
                                        ticID: itemEl.getAttribute('data-id')
                                    },
                                    contentType: "application/x-www-form-urlencoded"
                                }).done(function (response) {
                                    if (response.code != 200) {
                                        evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
                                    }

                                    self.setContent("ปิดงานซ่อมบำรุงแล้วเรียบร้อย");
                                    self.setTitle("สำเร็จ");
                                }).fail(function () {
                                    self.setTitle("มีบางอย่างผิดพลาด");
                                    self.setContent('ไม่สามารถปิดงานซ่อมบำรุงได้');
                                    evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
                                });
                            }
                        });
                    },
                    ยกเลิก: function () {
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
            }).done(function (response) {
                if (response.code != 200) {
                    evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
                    $.alert({
                        title: "มีบางอย่างผิดพลาด",
                        content: 'ไม่สามารถจัดความสำคัญงานได้'
                    });
                }
            }).fail(function () {

                $.alert({
                    title: "มีบางอย่างผิดพลาด",
                    content: 'ไม่สามารถจัดความสำคัญงานได้'
                });

                evt.from.insertBefore(itemEl, evt.from.childNodes[evt.oldDraggableIndex]);
            });
        }
    },
});

window.onscroll = function () { myFunction() };

var navbar = document.getElementById("sticky");

var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("fixed-top")
    } else {
        navbar.classList.remove("fixed-top");
    }
}
