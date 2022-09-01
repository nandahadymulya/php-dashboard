<?php
// session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
  header('location: ../../index.php?page=login&status=notlogin');
  exit();
}

require '../../config/config.php';

$menus = query("SELECT * FROM menus");
$no = 1;

?>
<title>Data Menu</title>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Menu</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Pages: Daftar Menu</li>
    </ol>

    <div class="card shadow-lg border-0 mb-4">
      <div class="card-header border-0 text-center p-4 bg-dark text-white">
        <i class="bi bi-table"></i>
        Table Data Menu
      </div>
      <div class="card-body border-0">
        <a href="?page=menus/create" class="btn btn-sm btn-primary mb-3">Add Menu</a>

        <table class="table table-bordered table-hover table-responsive-sm text-center rounded">
          <thead class="table-dark">
            <th scope="col">No.</th>
            <!-- <th scope="col">ID User</th> -->
            <th scope="col">Kode Menu</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Jenis Menu</th>
            <th scope="col">Actions</th>
          </thead>
          <tbody>
            <?php foreach ($menus as $menu) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $menu['kode_menu']; ?></td>
                <td><?= $menu['nama_menu']; ?></td>
                <td class="text-capitalize"><?= $menu['harga']; ?></td>
                <td class="text-capitalize"><?= $menu['jenis_menu']; ?>
                </td>
                <td>
                  <a href="index.php?page=menus/update&id=<?= $menu['kode_menu'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="index.php?page=menus/delete&id=<?= $menu['kode_menu'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete menu?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</main>