<?php

//koneksi ke database mysql,
$localhost  = "localhost";
$username   = "root";
$password   = "root";
$db         = "php_dashboard";

$conn = mysqli_connect($localhost, $username, $password, $db);

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function format_date($date) {
  date_default_timezone_set("Asia/Bangkok");
  $timenow = date("j-F-Y-h:i:s A");
  return date("F j, Y", strtotime($date));
}

