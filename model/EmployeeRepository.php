<?php
class EmployeeRepository
{
    function fetch($cond = null)
    {
        $sql = 'SELECT * FROM employees';
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        global $conn;
        $result = $conn->query($sql);
        $employees = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employee_id = $row['employee_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $phone_number = $row['phone_number'];
                $hire_date = $row['hire_date'];
                $salary = $row['salary'];
                $department_id = $row['department_id'];
                $employee = new Employee($employee_id, $first_name, $last_name, $email, $phone_number, $hire_date, $salary, $department_id);
                $employees[] = $employee;
            }
        }
        return $employees;
    }
    //lấy tất cả nhân viên trong database
    function getAll()
    {
        $employees = $this->fetch();
        return $employees;
    }
    //lấy tất cả nhân viên trong database theo điều kiện
    function getByPattern($search)
    {
        $cond = "name LIKE '%$search%'";
        $employees = $this->fetch();
        return $employees;
    }
    function save($data)
    {
        global $conn;
        $employee_id = $data['employee_id'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $phone_number = $data['phone_number'];
        $hire_date = $data['hire_date'];
        $salary = $data['salary'];
        $department_id = $data['department_id'];
        $sql = "INSERT INTO employees(employee_id,first_name,last_name,email,phone_number,hire_date,salary,department_id) 
        VALUES($employee_id,'$first_name','$last_name','$email','$phone_number','$hire_date','$salary',$department_id)";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function find($employee_id)
    {
        $cond = "employee_id = $employee_id";
        $employees = $this->fetch($cond);
        //lấy phần tử đầu tiên trong danh sách 
        $employee = current($employees);
        return $employee;
    }
    function update($employee)
    {
        global $conn;
        $employee_id = $employee->employee_id;
        $first_name = $employee->first_name;
        $last_name = $employee->last_name;
        $email = $employee->email;
        $phone_number = $employee->phone_number;
        $hire_date = $employee->hire_date;
        $salary = $employee->salary;
        $department_id = $employee->department_id;
        $sql = "UPDATE employees SET employee_id = $employee_id,first_name='$first_name',
        last_name ='$last_name',email = '$email',phone_number = '$phone_number',
        hire_date = '$hire_date',salary = '$salary', department_id = $department_id WHERE employee_id = $employee_id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM employees WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function Do($id)
    {
        // global $conn;
        // $sql = "SELECT employees*,departments.department_id AS id FROM employees
        //     JOIN departments ON department_id = departments.department_id";
        // if ($conn->query($sql)) {
        //     return true;
        // }
        // $this->error = $sql . '<br>' . $conn->error;
        // $result = $conn->query($sql);
        // $employees = [];
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $employee_id = $row['employee_id'];
        //         $first_name = $row['first_name'];
        //         $last_name = $row['last_name'];
        //         $email = $row['email'];
        //         $phone_number = $row['phone_number'];
        //         $hire_date = $row['hire_date'];
        //         $salary = $row['salary'];
        //         $department_id = $row['id'];
        //         $employee = new Employee($employee_id, $first_name, $last_name, $email, $phone_number, $hire_date, $salary, $department_id);
        //         $employees[] = $employee;
        //     }
        // }
        // return $employees;
        $cond = "department_id = $id";
        $employees = $this->fetch($cond);
        return $employees;
    }
}