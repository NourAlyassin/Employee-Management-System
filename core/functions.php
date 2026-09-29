<?php


session_start();


function setMessage($type, $message) {
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message
    ];
}

function showMessage() {
    if(isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='alert alert-$type'>$text</div>";

        unset($_SESSION['message']);
    }
}

function createEmpoloyee($name, $email, $salary, $phone, $type) {

    $employeeJson = __DIR__ . "/../data/employees.json";
    $scratchData = file_get_contents($employeeJson);
    $scratchDataEmployees = json_decode($scratchData, true);

    if(empty($scratchDataEmployees)){
        $newId = 1;
    } else {
        $ids = array_column($scratchDataEmployees, 'id');
        $newId = max($ids) + 1;
    }

    $empData = [
        "id" => $newId,
        "name" => $name,
        "email" => $email,
        "salary" => $salary,
        "phone" => $phone,
        "type" => $type
    ];
    
    $scratchDataEmployees[] = $empData;
    file_put_contents($employeeJson, json_encode($scratchDataEmployees, JSON_PRETTY_PRINT));

    return true;
}

function getEmployees() {

    $employeeJson = __DIR__ . "/../data/employees.json";
    if(file_exists($employeeJson)) {
        return json_decode(file_get_contents($employeeJson), true);
    }
    return [];
}

function updateEmployee($id, $name, $email, $salary, $phone, $type) {
    $employeeJson = __DIR__ . "/../data/employees.json";
    $oldData = file_get_contents($employeeJson);
    $oldDataEmployees = json_decode($oldData, true);

    $found = false;
    foreach($oldDataEmployees as &$emp) {
        if($emp['id'] == $id) {
            $emp['name'] = $name;
            $emp['email'] = $email;
            $emp['salary'] = $salary;
            $emp['phone'] = $phone;
            $emp['type'] = $type;
            $found = true;
            break;
        }
    }

    if($found) {
        file_put_contents($employeeJson, json_encode($oldDataEmployees, JSON_PRETTY_PRINT));
        return true;
    }
    return false;
}

function deleteEmployee($id) {
       $employeeJson = __DIR__ . "/../data/employees.json";
    $oldData = file_get_contents($employeeJson);
    $oldDataEmployees = json_decode($oldData, true);

    $found = false;
    foreach($oldDataEmployees as $key => $emp) {
        if($emp['id'] == $id) {
            unset($oldDataEmployees[$key]);
            $found = true;
            break;
        }
    }

    if($found) {
        $emps = array_values($oldDataEmployees);
        file_put_contents($employeeJson, json_encode($emps, JSON_PRETTY_PRINT));
        return true;
    }
    return false; 
}

function register($name, $email, $password, $confirm_password){

    $userJson = __DIR__ . "/../data/users.json";
    $scratchData = file_get_contents($userJson);
    $scratchDataUsers = json_decode($scratchData, true);


    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $usersData = [
        "name" => $name,
        "email" => $email,
        "password" => $hashPassword
    ];
    
    $scratchDataUsers[] = $usersData;
    file_put_contents($userJson, json_encode($scratchDataUsers, JSON_PRETTY_PRINT));

    return true;
}

function login($email, $password) {

    $userJson = __DIR__ . "/../data/users.json";
    $oldData = file_get_contents($userJson);
    $users = json_decode($oldData, true);

    foreach($users as $user) {
        if($user['email'] == $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                "name" => $user['name'],
                "email" => $user['email']
            ];
            return true;
        }
    }
    return false;
}