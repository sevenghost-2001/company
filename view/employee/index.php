<?php require 'layout/header.php' ?>
<h1>Danh sách nhân viên</h1>
<a href="?a=create" class="btn btn-info">Add</a>
<?php require 'layout/search.php' ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>employee_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>phone_number</th>
            <th>hire_date</th>
            <th>salary</th>
            <th>department_id</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee) : ?>
        <tr>
            <td><?= $employee->employee_id ?></td>
            <td><?= $employee->first_name ?></td>
            <td><?= $employee->last_name ?></td>
            <td><?= $employee->email ?></td>
            <td><?= $employee->phone_number ?></td>
            <td><?= $employee->hire_date ?></td>
            <td><?= $employee->salary ?></td>
            <td><?= $employee->department_id ?></td>
            <td><a class="btn btn-warning btn-sm" href="?a=edit&employee_id=<?= $employee->employee_id ?>">Sửa</a></td>
            <td>
                <button type="button" data-href="?a=destroy&employee_id=<?= $employee->employee_id ?>"
                    class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal">
                    Xóa
                </button>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div>
    <span>Số lượng: <?= count($employees) ?></span>
</div>
<?php require 'layout/footer.php' ?>