<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
  header('location: ../../index.php?page=login&status=notlogin');
  exit();
}

// ambil id dari url
if (isset($_GET['id'])) {
  $kode_transaksi = $_GET['id'];

  $transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE kode_transaksi = '$kode_transaksi'");
  // $menu = mysqli_fetch_assoc($transactions);

  //jika hasil query = 0 maka muncul pesan error
  if (mysqli_num_rows($transactions) == 0) {
    echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
    exit();
    //jika hasil query > 0
  } else {
    //membuat variabel $data dan menyimpan data row dari query
    $menu = mysqli_fetch_assoc($transactions);
  }
}

if (isset($_POST['submit'])) {
  $kode_transaksi   = htmlspecialchars($_POST['kode_transaksi']);
  $nama_customer   = htmlspecialchars($_POST['nama_customer']);
  $menu       = htmlspecialchars($_POST['menu']);
  $harga       = htmlspecialchars($_POST['harga']);
  $jumlah_bayar    = htmlspecialchars($_POST['jumlah_bayar']);
  $total_bayar    = $jumlah_bayar - $harga;

  $query_update = "UPDATE transactions SET
                        nama_customer = '$nama_customer',
                        menu = '$menu',
                        harga = '$harga',
                        jumlah_bayar = '$jumlah_bayar',
                        total_bayar = '$total_bayar'
                    WHERE kode_transaksi = '$kode_transaksi'
                    ";

  $update = mysqli_query($conn, $query_update) or die(mysqli_error($conn));

  if ($update) {
    echo '
            <script>
                alert("Successfully updated Menu!");
                document.location="index.php?page=transactions";
            </script>
            ';
  } else {
    echo '
            <script>
                alert("Failed updated Menu!");
                document.location="index.php?page=transactions/update&id=' . $kode_transaksi . '";
            </script>
            ';
  }
}
?>
<title>Create Transaction &mdash; PHP MVC </title>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Transaction</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Transactions / Update</li>
    </ol>

    <div class="row gx-5 py-md-5 justify-content-center">
      <div class="col-md-4 py-md-4">
        <form class="form-container py-md-4" action="index.php?page=transactions/update&id=<?= $kode_transaksi; ?>" method="POST">
          <div class="mb-3">
            <label for="kode_transaksi" class="form-label">Kode Menu</label>
            <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi" value="<?= $menu['kode_transaksi'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama_customer" class="form-label">Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" id="nama_customer" value="<?= $menu['nama_customer'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="menu" class="form-label">Menu</label>
            <input type="text" name="menu" class="form-control" id="menu" value="<?= $menu['menu'] ?>" required>
          </div>
          <div class=" mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="<?= $menu['harga'] ?>" required>
          </div>
          <div class=" mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
            <input type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" value="<?= $menu['jumlah_bayar'] ?>" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">
            Save
          </button>
        </form>
      </div>
    </div>
  </div>
</main>