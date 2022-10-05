<?php
session_start();
//import config & connerctDb
require 'config.php';
require 'connectDB.php';
//import models
require 'model/employee.php';
require 'model/EmployeeRepository.php';

require 'model/department.php';
require 'model/DepartmentRepository.php';

//điều hướng đến controller cụ thể dựa vào tham số
$c = $_GET['c'] ?? 'employee';
$a = $_GET['a'] ?? 'index';
$controller = ucfirst($c) . 'Controller'; //studentcontroller
//import controller vào hệ thống
require "controller/$controller.php";
$controller = new $controller();
$controller->$a();