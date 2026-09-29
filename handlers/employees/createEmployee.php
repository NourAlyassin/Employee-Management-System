<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $salary = trim($_POST['salary']);
    $phone = trim($_POST['phone']);
    $type = trim($_POST['type']);

    $error = validateEmployee($name, $email, $salary, $phone, $type);

    if (!empty($error)) {
        setMessage("danger", $error);
        header("Location: ../../views/employees/create.php");
        exit;
    }

    if (createEmpoloyee($name, $email, $salary, $phone, $type)) {
        setMessage("success", 'Employee Added Successfully!');
        header("Location: ../../views/employees/create.php");
        exit;
    }
}
