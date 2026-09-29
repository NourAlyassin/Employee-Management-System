<?php
require "../../inc/header.php";

$id = $_GET['id'];
if (!isset($id)) {
    setMessage("danger", "No Employee Selected!");
    header("Location: ../../index.php");
    exit;
}

$employees = getEmployees();
$employee = null;
foreach($employees as $emp) {
    if($emp['id'] == $id) {
        $employee = $emp;
        break;
    }
}

?>

<div class="container content mt-4">

    <h2>Update Employee Form</h2>
    <form action="../../handlers/employees/updateEmployee.php" method="POST">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
                <input type="text" id="name" name="name" value="<?= $employee['name'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="text" id="email" name="email" value="<?= $employee['email'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary :</label>
            <input type="number" id="salary" name="salary" value="<?= $employee['salary'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone :</label>
            <input type="text" id="phone" name="phone" value="<?= $employee['phone'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Employee Type :</label>
            <select name="type" id="type" class="form-select">
                <option value="full_time" <?= $employee['type'] == "full_time" ? 'selected' : "" ?>>Full Time</option>
                <option value="part_time" <?= $employee['type'] == "part_time" ? 'selected' : "" ?>>Part Time</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require "../../inc/footer.php"; ?>