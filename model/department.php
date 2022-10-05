<?php 
class Department
{
    public $department_id;
    public $department_name;

    function __construct($department_id,$deparment_name)
    {
        $this->department_id = $department_id;
        $this->department_name = $deparment_name;
    }
}