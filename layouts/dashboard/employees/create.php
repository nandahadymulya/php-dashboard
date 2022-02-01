<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
    header('location: ../../index.php?page=login&status=notlogin');
    exit();
}

if (isset($_POST['submit'])) {
    $idcard     = $_POST['idcard'];
    $name       = $_POST['name'];
    $phone      = $_POST['phone'];
    $jobdesc    = $_POST['jobdesc'];

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM employees WHERE idcard='$idcard'"
    ) or die(mysqli_error($conn));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query(
            $conn,
            "INSERT INTO employees (idcard, name, phone, jobdesc) 
            VALUES ('$idcard', '$name', '$phone', '$jobdesc')"
        ) or die(mysqli_error($conn));

        if ($sql) {
            echo '
                <script>
                    alert("Berhasil Register!");
                    document.location="index.php?page=employees";
                </script>
            ';
        } else {
            echo '
                <div class="alert alert-warning">
                    Gagal melakukan proses tambah data karyawan!
                </div>
            ';
        }
    } else {
        echo '
            <div class="alert alert-warning">
                Gagal, Nama sudah terdaftar!
            </div>
        ';
    }
}

?>
<title>Register &mdash; PHP MVC </title>
<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>