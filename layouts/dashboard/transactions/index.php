<?php
// session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
  header('location: ../../index.php?page=login&status=notlogin');
  exit();
}

require '../../config/config.php';

$transactions = query("SELECT * FROM transactions");
$no = 1;

?>
<title>Data Transaction</title>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Transaction</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Pages: Daftar Transaction</li>
    </ol>

    <div class="card shadow-lg border-0 mb-4">
      <div class="card-header border-0 text-center p-4 bg-dark text-white">
        <i class="bi bi-table"></i>
        Table Data Transaction
      </div>
      <div class="card-body border-0">
        <a href="?page=transactions/create" class="btn btn-sm btn-primary mb-3">Add Transaction</a>

        <table class="table table-bordered table-hover table-responsive-sm text-center rounded">
          <thead class="table-dark">
            <th scope="col">No.</th>
            <th scope="col">Kode Transaksi</th>
            <th scope="col">Nama</th>
            <th scope="col">Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah Bayar</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Actions</th>
          </thead>
          <tbody>
            <?php foreach ($transactions as $transaction) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $transaction['kode_transaksi']; ?></td>
                <td><?= $transaction['nama_customer']; ?></td>
                <td><?= $transaction['menu']; ?></td>
                <td><?= $transaction['harga']; ?></td>
                <td><?= $transaction['jumlah_bayar']; ?>
                </td>
                <td><?= $transaction['total_bayar']; ?>
                </td>
                <td>
                  <a href="index.php?page=transactions/update&id=<?= $transaction['kode_transaksi'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="index.php?page=transactions/delete&id=<?= $transaction['kode_transaksi'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete Transaction?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</main>