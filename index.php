<?php require "inc/header.php"; ?>

<div class="container content mt-4">
    <div class="content">
        <h1>Welcome to Employee Managment</h1>

        <h2 class="mt-5">Employee List</h2>

        <table class="table table-bordered table-hover align-middle mt-3">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Phone</th>
                    <th>Employee Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getEmployees() as $employee) {
                    echo "
                <tr>
                    <td>{$employee['id']}</td>
                    <td>{$employee['name']}</td>
                    <td>{$employee['email']}</td>
                    <td>{$employee['salary']}</td>
                    <td>{$employee['phone']}</td>
                    <td>{$employee['type']}</td>
                    <td class='text-center text-nowrap'>
                        <a href='views/employees/update.php?id={$employee['id']}' class='btn btn-sm btn-primary'>Edit</a>
                        <a href='handlers/employees/deleteEmployee.php?id={$employee['id']}' class='btn btn-sm btn-danger'>Delete</a>
                    </td>
                </tr>
                ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "inc/footer.php"; ?>