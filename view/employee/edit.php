<?php require 'layout/header.php' ?>
<h1>Cập nhật thông tin</h1>
<form action="?a=update" method="POST">
    <input type="hidden" name="employee_id" value="<?= $employee->employee_id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="first_name">Tên sinh viên</label>
                    <input type="text" name="first_name" id="first_name" value="<?= $employee->first_name ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Họ sinh viên</label>
                    <input type="text" name="last_name" id="last_name" value="<?= $employee->last_name ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email sinh viên</label>
                    <input type="email" name="email" id="email" value="<?= $employee->email ?>">
                </div>
                <div class="form-group">
                    <label for="phone_number">số điện thoại</label>
                    <input type="text" name="phone_number" id="phone_number" value="<?= $employee->phone_number ?>">
                </div>
                <div class="form-group">
                    <label for="hire_date">Ngày thuê</label>
                    <input type="date" name="hire_date" id="hire_date" value="<?= $employee->hire_date ?>">
                </div>
                <div class="form-group">
                    <label for="salary">Mức lương</label>
                    <input type="text" name="salary" id="salary" value="<?= $employee->salary ?>">
                </div>
                <div class="form-group">
                    <label for="department_id">Mã Phòng</label>
                    <input type="text" name="department_id" id="department_id" value="<?= $employee->department_id ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require 'layout/footer.php' ?>