$(() => {
    const userDropdown = $('a.user#userActionDropdown');
    const dropdownMenu = $('div.dropdown-menu-c#userActionDropdown');

    let dropdownState = false;

    userDropdown.click((e) => {
        e.preventDefault();

        if (dropdownState) {
            dropdownMenu.addClass('hidden');
        } else {
            dropdownMenu.removeClass('hidden');
        }

        dropdownState = !dropdownState;
    });
});


// Maintain List
var pendingList = document.getElementById('pendingList');

if (pendingList) {
    Sortable.create(pendingList, {
        group: 'shared',
        ghostClass: 'blue-background-class',
        animation: 150,
        scroll: true,
        scrollSensitivity: 50,
        scrollSpeed: 10,
        bubbleScroll: true,
        dataIdAttr: 'data-id',
        onEnd: function ( /**Event*/ evt) {
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
                /*
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
                                        url: `${baseURL}/RepairList/close/`,
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
                */
            } else {
                $.ajax({
                    url: `${baseURL}/RepairList/priority/`,
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

}

function closeJob(devID) {
    $.confirm({
        title: 'ระบุหมายเหตุ',
        content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>หมายเหตุ (ถ้ามี)</label>' +
            '<input type="text" class="name form-control" required />' +
            '</div>' +
            '</form>',
        buttons: {
            formSubmit: {
                text: 'ต่อไป',
                btnClass: 'btn-blue',
                action: function () {
                    var name = this.$content.find('.name').val();
                    $.confirm({
                        title: 'การยืนยัน',
                        content: 'ต้องการปิดงานซ่อมบำรุงนี้หรือไม่',
                        buttons: {
                            ปิดงาน: function () {
                                $.alert({
                                    content: function () {
                                        var self = this;
                                        return $.ajax({
                                            url: `${baseURL}/RepairList/close/`,
                                            dataType: 'json',
                                            method: 'POST',
                                            data: {
                                                devID: devID,
                                                note: name,
                                            },
                                            contentType: "application/x-www-form-urlencoded"
                                        }).done(function (response) {
                                            if (response.code != 200) {
                                                $.alert({
                                                    title: "มีบางอย่างผิดพลาด",
                                                    content: 'ไม่สามารถปิดงานซ่อมบำรุงได้'
                                                });
                                                return;
                                            }

                                            self.setContent("ปิดงานซ่อมบำรุงแล้วเรียบร้อย");
                                            self.setTitle("สำเร็จ");
                                            location.reload();
                                        }).fail(function () {
                                            self.setTitle("มีบางอย่างผิดพลาด");
                                            self.setContent('ไม่สามารถปิดงานซ่อมบำรุงได้');
                                        });
                                    }
                                });
                            },
                            ยกเลิก: function () {

                            }
                        }
                    });
                }
            },
            ยกเลิก: function () {
            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
}

function acceptJob(devID) {
    $.confirm({
        title: 'การยืนยัน',
        content: 'จะรับเรื่องซ่อมนี้หรือไม่',
        buttons: {
            รับเรื่อง: function () {
                $.alert({
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: `${baseURL}/RepairList/accept/`,
                            dataType: 'json',
                            method: 'POST',
                            data: {
                                devID: devID
                            },
                            contentType: "application/x-www-form-urlencoded"
                        }).done(function (response) {
                            if (response.code != 200) {
                                $.alert({
                                    title: "มีบางอย่างผิดพลาด",
                                    content: 'ไม่สามารถรับงานซ่อมบำรุงได้'
                                });
                                return;
                            }

                            self.setContent("รับงานซ่อมบำรุงแล้วเรียบร้อย");
                            self.setTitle("สำเร็จ");
                            location.reload();
                        }).fail(function () {
                            self.setTitle("มีบางอย่างผิดพลาด");
                            self.setContent('ไม่สามารถรับงานซ่อมบำรุงได้');
                        });
                    }
                });
            },
            ยกเลิก: function () {

            }
        }
    });
}
