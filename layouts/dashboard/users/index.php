<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
    header('location: ../../index.php?page=login&status=notlogin');
    exit();
}

$users = query("SELECT * FROM users ORDER BY user_id ASC");

?>
<title>Data Users &mdash; PHP MVC</title>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header text-center">
                <i class="fas fa-table me-1"></i>
                Table Data User
            </div>
            <div class="card-body">
                <a href="?page=users/create" class="btn btn-primary mb-3">Add User</a>

                <table class="table table-responsive-sm text-center">
                    <thead>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['user_id']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['fullname']; ?></td>
                                <td class="text-dark">
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <p>Developer</p>
                                    <?php elseif ($user['role_id'] == 2) : ?>
                                        <p>Administrator</p>
                                    <?php elseif ($user['role_id'] == 3) : ?>
                                        <p>User</p>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?page=users/update&id=<?= $user['user_id'] ?>">Edit</a>
                                    <a href="index.php?page=users/delete&id=<?= $user['user_id'] ?>" onclick="return confirm('Are you sure to delete user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>

<!-- Button trigger modal -->