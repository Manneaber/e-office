<body>
    <div class="container">
        <div class="intro"><br>
            <h2 class="text-center"><strong>แจ้งซ่อมครุภัณฑ์</strong></h2>
            <p class="text-center">คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น<br></p>
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center">Faculty of Science,&nbsp;Khon Kaen&nbsp;University<br></p>
        </div>
        <div class="col mb-3">
            <form>
                <div class="form-group row">
                    <label for="inputId" class="col-sm-2 col-form-label">รหัสครุภัณฑ์ : </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputId">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">สถานที่ : </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="location">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBreakdown" class="col-sm-2 col-form-label">อาการ : </label>
                    <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="inputBreakdown"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ความร่งด่วนของการซ่อม : </label>
                    <div class="col-sm-10">
                        <select class="form-control">
                            <option>น้อย</option>
                            <option>ปานกลาง</option>
                            <option>มาก</option>
                            <option>มากที่สุด</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNote" class="col-sm-2 col-form-label">หมายเหตุ : </label>
                    <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="inputNote"></textarea>
                    </div>
                </div>
                <div class="form-group row float-right">
                    <button type="button" class="btn btn-outline-danger ">ยกเลิก</button>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-outline-success">ตกลง</button>
                    </div>
                </div>
            </form>             
        </div>
    </div>
</body>