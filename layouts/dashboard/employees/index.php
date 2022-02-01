<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
    header('location: ../../index.php?page=login&status=notlogin');
    exit();
}
$employees = query("SELECT * FROM employees");

?>
<title>Data Employees &mdash; PHP MVC</title>
<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">
        Tambah Data Employee
    </button>


    <div class="row p-4">
        <div class="col-md-10">
            <table class="table table-sm table-bordered table-responsive-sm text-center">
                <thead>
                    <th>Actions</th>
                    <th>ID Employee</th>
                    <th>ID Card</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Job Descripsion</th>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($employees as $employee) : ?>
                            <?php if ($row_employees = 0) : ?>
                                <td colspan="6">
                                    <div class="alert alert-danger" role="alert">
                                        Data not found!
                                    </div>
                                </td>
                            <?php else : ?>
                                <td><?= $actions; ?></td>
                                <td><?= $employee['employee_id']; ?></td>
                                <td><?= $employee['idcard']; ?></td>
                                <td><?= $employee['name']; ?></td>
                                <td><?= $employee['phone']; ?></td>
                                <td><?= $employee['jobdesc']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>