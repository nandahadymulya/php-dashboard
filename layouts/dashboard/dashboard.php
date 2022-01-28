<?php

session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role_id'] == "") {
    header("location:../../index.php?page=login&pesan=gagal");
}


?>
<title>Dashboard &mdash; PHP MVC</title>
<main>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, <?= $_SESSION['username']; ?>!</p>


    <p>You are logged in as a <strong><?php $role === $_SESSION['role_id']; ?></strong>.</p>
    <p class="text-black"><a href="../logout.php">Log out</a></p>
</main>