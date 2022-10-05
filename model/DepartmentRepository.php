<?php
class DepartmentRepository
{
    function fetch($cond = null)
    {
        $sql = "SELECT * FROM departments";
        if ($cond) {
            $sql .= "WHERE $cond";
        }
        global $conn;
        $result = $conn->query($sql);
        $departments = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $department_id = $row['department_id'];
                $department_name = $row['department_name'];
                $department = new Department($department_id, $department_name);
                $departments[] = $department;
            }
        }
        return $departments;
    }
    function getAll()
    {
        $departments = $this->fetch();
        return $departments;
    }
    function getByPattern($search)
    {
        $cond = "name LIKE '%$search%'";
        $departments = $this->fetch();
        return $departments;
    }
    function save($data)
    {
        global $conn;
        $department_id = $data['department_id'];
        $department_name = $data['department_name'];
        $sql = "INSERT INTO departments(department_id,department_name) 
        VALUES($department_id,'$department_name')";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function find($department_id)
    {
        $cond = "department_id = $department_id";
        $departments = $this->fetch($cond);
        //lấy phần tử đầu tiên trong danh sách 
        $department = current($departments);
        return $department;
    }
    function update($department)
    {
        global $conn;
        $department_id = $department->department_id;
        $department_name = $department->department_name;
        $sql = "UPDATE departments SET department_id = $department_id,department_name='$department_name'
         WHERE department_id = $department_id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM departments WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
    function create($id)
    {
        global $conn;
        $sql = "SELECT * FROM employees WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
    }
}