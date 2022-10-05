<?php require 'layout/header.php' ?>
<h1>Thêm phòng ban</h1>
<form action="?c=department&a=store" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Mã phòng ban</label>
                    <input type="number" class="form-control" placeholder="Mã số phòng ban" required
                        name="department_id">
                </div>
                <div class="form-group">
                    <label>Tên phòng ban</label>
                    <input type="text" class="form-control" placeholder="Tên của phòng ban" required
                        name="department_name">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require 'layout/footer.php' ?>