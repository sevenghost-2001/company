<?php
class DepartmentController
{
    function index()
    {
        $search = $_GET['search'] ?? '';
        $departmentRepository = new DepartmentRepository();
        if ($search) {
            $departments = $departmentRepository->getByPattern($search);
        } else {
            $departments = $departmentRepository->getAll();
        }
        require 'view/department/index.php';
    }
    function create()
    {
        require 'view/department/create.php';
    }
    function store()
    {
        $departmentRepository = new DepartmentRepository();
        if ($departmentRepository->save($_POST)) {
            $_SESSION['success'] = "Đã thêm phòng ban thành công";
            header('location:/?c=department');
            exit;
        }
        $_SESSION['error'] = $departmentRepository->error;
        header('location:/?c=department');
    }
    function edit()
    {
        $department_id = $_GET['department_id'];
        $departmentRepository = new DepartmentRepository();
        $department = $departmentRepository->find($department_id);
        require 'view/department/edit.php';
    }
    function update()
    {
        $department_id = $_POST['department_id'];
        $department_name = $_POST['department_name'];
        $departmentRepository = new DepartmentRepository();
        //dữ liệu cũ trong database
        $department = $departmentRepository->find($department_id);
        //cập nhật đối tượng
        $department->department_id = $department_id;
        $department->department_name = $department_name;

        //cập nhập xuống database
        if ($departmentRepository->update($department)) {
            $_SESSION['success'] = 'Đã cập nhật thành công';
            header('location:/?c=department');
            exit;
        }
        $_SESSION['error'] = $departmentRepository->error;
        header('location:/?c=department');
    }
    function destroy()
    {
        $id = $_GET['department_id'];
        $departmentRepository = new DepartmentRepository();
        if ($departmentRepository->delete($id)) {
            $_SESSION['success'] = "Đã xóa thành công";
            header('location:/?c=department');
            exit;
        }
        $_SESSION['error'] = $departmentRepository->error;
        header('location:/?c=department');
    }
}