<?php

require "../../core/validations.php";
require "../../core/functions.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $salary = trim($_POST['salary']);
    $phone = trim($_POST['phone']);
    $type = trim($_POST['type']);

    $error = validateEmployee($name, $email, $salary, $phone, $type);
    
    if(!empty($error)) {
        setMessage("danger", $error);
        header("Location: ../../views/employees/update.php");
        exit;
    }
    
    if(updateEmployee($id, $name, $email, $phone, $salary, $type)) {
        setMessage("success", "Employee Updated Successfully!");
        header("Location: ../../index.php");
        exit;
    } else {
        setMessage("danger", "Fail Update Employee!");
        header("Location: ../../views/employees/update.php");
        exit;
    }
}