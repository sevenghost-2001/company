<?php require 'layout/header.php' ?>
<h1>Danh sách phòng ban</h1>
<a href="?c=department&a=create" class="btn btn-info">Add</a>
<?php require 'layout/search.php' ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>department_id</th>
            <th>department_name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departments as $department) : ?>
        <tr>
            <td><?= $department->department_id ?></td>
            <td><?= $department->department_name ?></td>
            <td><a class="btn btn-warning btn-sm"
                    href="?c=department&a=edit&department_id=<?= $department->department_id ?>">Sửa</a>
            </td>
            <td>
                <button type="button"
                    data-href="?c=department&a=destroy&department_id=<?= $department->department_id ?>"
                    class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal">
                    Xóa
                </button>
            </td>
            <td><a class="btn btn-info btn-sm"
                    href="?c=employee&a=list&department_id=<?= $department->department_id ?>">Danh
                    sách nhân
                    viên</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div>
    <span>Số lượng: <?= count($departments) ?></span>
</div>
<?php require 'layout/footer.php' ?>