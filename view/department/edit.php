<?php require 'layout/header.php' ?>
<h1>Cập nhật thông tin</h1>
<form action="?c=department&a=update" method="POST">
    <input type="hidden" name="department_id" value="<?= $department->department_id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="department_name">Tên phòng ban</label>
                    <input type="text" name="department_name" id="department_name"
                        value="<?= $department->department_name ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require 'layout/footer.php' ?>