<?php
require 'config.php';

if (isset($_GET['status'])) {
    // if ($_GET['status'] == "gagal") {
    //     echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    // }
}

// mengaktifkan session pada php
session_start();

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE username='$username' and password='$password'"
);

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai developer
    if ($data['role_id'] == 1) {

        // buat session login dan username
        $_SESSION['login'] = $login;
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $data['role_id'];

        // alihkan ke halaman dashboard admin
        header('location: ../layouts/dashboard/index.php?page=dashboard&status=login');


        // cek jika user login sebagai administrator
    } else if ($data['role_id'] == 2) {

        // buat session login dan username
        $_SESSION['login'] = $login;
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $data['role_id'];

        // alihkan ke halaman dashboard admin
        header('location: ../layouts/dashboard/index.php?page=dashboard&status=login');

        // cek jika user login sebagai user
    } else if ($data['role_id'] == 3) {

        // buat session login dan username
        $_SESSION['login'] = $login;
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $data['role_id'];

        // alihkan ke halaman dashboard admin
        header('location: ../layouts/dashboard/index.php?page=dashboard&status=login');


        // cek jika user login tidak ada di database 
    } else {

        // alihkan ke halaman login kembali
        header("location: ../index.php?page=login&status=gagal");
        exit();
    }


    // cek jika user login tidak ada di database 
} else {

    // alihkan ke halaman login kembali
    header("location: ../index.php?page=login&status=notlogin");
    exit();
}
