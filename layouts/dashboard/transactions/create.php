<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
  header('location: ../../index.php?page=login&status=notlogin');
  exit();
}

$kode = maxPrimary('kode_transaksi', 'transactions', 'TRS');

if (isset($_POST['submit'])) {
  $kode_transaksi   = htmlspecialchars($_POST['kode_transaksi']);
  $nama_customer   = htmlspecialchars($_POST['nama_customer']);
  $menu   = htmlspecialchars($_POST['menu']);
  $harga   = htmlspecialchars($_POST['harga']);
  $jumlah_bayar    = htmlspecialchars($_POST['jumlah_bayar']);
  $total_bayar    = $jumlah_bayar - $harga;


  $query_create = "INSERT INTO transactions (kode_transaksi, nama_customer, menu, harga, jumlah_bayar, total_bayar) 
                        VALUES ('$kode_transaksi', '$nama_customer', '$menu', '$harga', '$jumlah_bayar', '$total_bayar')";

  $kode_checker = "SELECT * FROM transactions WHERE kode_transaksi='$kode_transaksi'";
  $check = mysqli_query($conn, $kode_checker) or die(mysqli_error($conn));

  if (mysqli_num_rows($check) == 0) {
    $create = mysqli_query($conn, $query_create) or die(mysqli_error($conn));

    if ($create) {
      echo '
                <script>
                    alert("Successfully added new Menu!");
                    document.location="index.php?page=transactions";
                </script>
            ';
    } else {
      echo '
                <script>
                    alert("Failed add new menu!");
                    document.location="index.php?page=transactions";
                </script>
            ';
    }
  } else {
    echo '
            <script>
                alert("Use another kode!");
                document.location="index.php?page=transactions/create";
             </script>
        ';
  }
}

?>
<title>Create Menu &mdash; PHP MVC </title>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Menu</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Transactions / Create</li>
    </ol>

    <div class="row gx-5 py-md-5 justify-content-center">
      <div class="col-md-4 py-md-4">
        <form class="form-container py-md-4" action="index.php?page=transactions/create" method="POST">
          <div class="mb-3">
            <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
            <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi" value="<?= $kode; ?>" required readonly>
          </div>
          <div class=" mb-3">
            <label for="nama_customer" class="form-label">Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" id="nama_customer" placeholder="Masukkan Customer" required>
          </div>
          <div class="mb-3">
            <label for="menu" class="form-label">Menu</label>
            <input type="text" name="menu" class="form-control" id="menu" placeholder="Masukkan Menu" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan harga" required>
          </div>
          <div class="mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
            <input type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Masukkan jumlah bayar" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">
            Save
          </button>
        </form>
      </div>
    </div>
  </div>
</main>