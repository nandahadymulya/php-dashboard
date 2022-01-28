<?php

session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role_id'] == "") {
    header("location:../../index.php?page=login&pesan=gagal");
}


?>
<title>Dashboard &mdash; PHP MVC</title>
<div class="container-fluid">
    <h2 class="mt-4">Welcome,
        <span class="text-capitalize"> <?= $_SESSION['username'] ?></span>!
    </h2>
    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    <p>
        Make sure to keep all page content within the
        <code>#page-content-wrapper</code>
        . The top navbar is optional, and just for demonstration. Just create an element with the
        <code>#sidebarToggle</code>
        ID which will toggle the menu when clicked.
    </p>
</div>

<p>You are logged in as a <strong><?php $role === $_SESSION['role_id']; ?></strong>.</p>
<p class="text-black"><a href="../logout.php">Log out</a></p>