<?php require 'layout/header.php' ?>
<h1>Thêm nhân viên</h1>
<form action="?a=store" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Mã nhân viên</label>
                    <input type="number" class="form-control" placeholder="Mã số nhân viên" required name="employee_id"
                        min=207>
                </div>
                <div class="form-group">
                    <label>firstname</label>
                    <input type="text" class="form-control" placeholder="Tên của nhân viên" required name="first_name">
                </div>
                <div class="form-group">
                    <label>lastname</label>
                    <input type="text" class="form-control" placeholder="Họ của nhân viên" required name="last_name">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" required name="email">
                </div>
                <div class="form-group">
                    <label>phone number</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" required name="phone_number">
                </div>
                <div class="form-group">
                    <label>hire date</label>
                    <input type="date" class="form-control" placeholder="ngày thuê" required name="hire_date">
                </div>
                <div class="form-group">
                    <label>salary</label>
                    <input type="text" class="form-control" placeholder="lương của nhân viên" required name="salary">
                </div>
                <div class="form-group">
                    <label>mã văn phòng</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                        <option value="">Vui lòng chọn mã phòng</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require 'layout/footer.php' ?>