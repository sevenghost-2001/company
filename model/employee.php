<?php 
class Employee
{
    public $employee_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $hire_date;
    public $salary;
    public $department_id;

    function __construct($employee_id,$first_name,$last_name,$email
    ,$phone_number,$hire_date,$salary,$department_id)
    {
        $this->employee_id = $employee_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->hire_date = $hire_date;
        $this->salary = $salary;
        $this->department_id = $department_id;
    }
}