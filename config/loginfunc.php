<?php
require 'config.php';

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
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
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $data['role_id'];
        // alihkan ke halaman dashboard admin
        header('location: ../layouts/dashboard/index.php');

        // cek jika user login sebagai karyawan
    } else if ($data['level'] == "karyawan") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "karyawan";
        // alihkan ke halaman dashboard karyawan
        header("location: karyawan/index.php");
    } else {
        // alihkan ke halaman login kembali
        header("location: ../index.php?page=login");
        exit();
    }
} else {
    // alihkan ke halaman login kembali

    header("location: ../index.php?page=login");
    exit();
}
