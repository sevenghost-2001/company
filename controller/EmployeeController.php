<?php
class EmployeeController
{
    function index()
    {
        $search = $_GET['search'] ?? '';
        $employeeRepository = new EmployeeRepository();
        if ($search) {
            $employees = $employeeRepository->getByPattern($search);
        } else {
            $employees = $employeeRepository->getAll();
        }
        require 'view/employee/index.php';
    }
    function create()
    {
        require 'view/employee/create.php';
    }
    function store()
    {
        $employeeRepository = new EmployeeRepository();
        if ($employeeRepository->save($_POST)) {
            $_SESSION['success'] = "Đã thêm nhân viên thành công";
            header('location:/');
            exit;
        }
        $_SESSION['error'] = $employeeRepository->error;
        header('location:/');
    }
    function edit()
    {
        $employee_id = $_GET['employee_id'];
        $employeeRepository = new EmployeeRepository();
        $employee = $employeeRepository->find($employee_id);
        require 'view/employee/edit.php';
    }
    function update()
    {
        $employee_id = $_POST['employee_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $hire_date = $_POST['hire_date'];
        $salary = $_POST['salary'];
        $department_id = $_POST['department_id'];
        $employeeRepository = new EmployeeRepository();
        //dữ liệu cũ trong database
        $employee = $employeeRepository->find($employee_id);
        //cập nhật đối tượng
        $employee->employee_id = $employee_id;
        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->email = $email;
        $employee->phone_number = $phone_number;
        $employee->hire_date = $hire_date;
        $employee->salary = $salary;
        $employee->department_id = $department_id;
        //cập nhập xuống database
        if ($employeeRepository->update($employee)) {
            $_SESSION['success'] = 'Đã cập nhật thành công';
            header('location:/');
            exit;
        }
        $_SESSION['error'] = $employeeRepository->error;
        header('location:/');
    }
    function destroy()
    {
        $id = $_GET['employee_id'];
        $employeeRepository = new EmployeeRepository();
        if ($employeeRepository->delete($id)) {
            $_SESSION['success'] = "Đã xóa thành công";
            header('location:/');
            exit;
        }
        $_SESSION['error'] = $employeeRepository->error;
        header('location:/');
    }
    function list()
    {
        $id = $_GET['department_id'];
        $employeeRepository = new EmployeeRepository();
        // if ($employeeRepository->Do($id)) {
        //     $_SESSION['success'] = "Hiển thị danh sách nhân viên cùng phòng thành công";
        //     header('location:/');
        //     exit;
        // }
        $employees = $employeeRepository->Do($id);
        require 'view/employee/index.php';
    }
}