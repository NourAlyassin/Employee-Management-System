<?php

require "../../core/validations.php";
require "../../core/functions.php";

    $id = trim($_GET['id']);


    if (!isset($id)) {
        setMessage("danger", "No Employee Selected!");
        header("Location: ../../index.php");
        exit;
    }


    if (deleteEmployee($id)) {
        setMessage("success", "Employee Deleted Successfully!");
        header("Location: ../../index.php");
        exit;
    }

