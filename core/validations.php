<?php

function validateRequired($fieldName, $value) {
    if(empty($value)) {
        return "$fieldName is required!";
    }
    return null;
}

function validateEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null;
    }
    return "Invalid Email!";
}

function validateSalary($salary) {
    if(is_numeric($salary) && $salary > 0) {
        return null;
    }
    return "Salary Must be a Positive Number!";
}

function validatePassword($password) {
    if(strlen($password < 6)) {
        return "Password must be 6 char";
    }

    if(!preg_match("/[A-Z]/",$password)) {
        return "Password Must be Containing Uppercase!";
    }
    if(!preg_match("/[a-z]/",$password)) {
        return "Password Must be Containing Lowerrcase!";
    }
    if(!preg_match("/[0-1]/",$password)) {
        return "Password Must be Containing Numbers!";
    }
}

function validateEmployee($name, $email, $salary, $phone, $type) {
    $fields = [
        "name" => $name,
        "email" => $email,
        "salary" => $salary,
        "phone" => $phone,
        "type"=> $type
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    if($error = validateEmail($email)) {
        return $error;
    }

    if($error = validateSalary($salary)) {
        return $error;
    }
}

function validateRegister($name, $email, $password, $confirm_password) {

    $fields = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "confirm_password"=> $confirm_password
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    if($error = validateEmail($email)) {
        return $error;
    }

    if($error = validatePassword($password)) {
        return $error;
    }
}

function validateLogin($email, $password) {

    $fields = [
        "email" => $email,
        "password" => $password,
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    // if($error = validateEmail($email)) {
    //     return $error;
    // }

    // if($error = validatePassword($password)) {
    //     return $error;
    // }
}