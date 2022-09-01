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
  $kode_menu = $_GET['id'];

  $menus = mysqli_query($conn, "SELECT * FROM menus WHERE kode_menu = '$kode_menu'");
  // $menu = mysqli_fetch_assoc($menus);

  //jika hasil query = 0 maka muncul pesan error
  if (mysqli_num_rows($menus) == 0) {
    echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
    exit();
    //jika hasil query > 0
  } else {
    //membuat variabel $data dan menyimpan data row dari query
    $menu = mysqli_fetch_assoc($menus);
  }
}

if (isset($_POST['submit'])) {
  $kode_menu   = htmlspecialchars($_POST['kode_menu']);
  $nama_menu   = htmlspecialchars($_POST['nama_menu']);
  $harga       = htmlspecialchars($_POST['harga']);
  $jenis_menu    = htmlspecialchars($_POST['jenis_menu']);

  $query_update = "UPDATE menus SET
                        nama_menu = '$nama_menu',
                        harga = '$harga',
                        jenis_menu = '$jenis_menu'
                    WHERE kode_menu = '$kode_menu'
                    ";

  $update = mysqli_query($conn, $query_update) or die(mysqli_error($conn));

  if ($update) {
    echo '
            <script>
                alert("Successfully updated Menu!");
                document.location="index.php?page=menus";
            </script>
            ';
  } else {
    echo '
            <script>
                alert("Failed updated Menu!");
                document.location="index.php?page=menus/update&id=' . $kode_menu . '";
            </script>
            ';
  }
}
?>
<title>Create Menu &mdash; PHP MVC </title>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Menu</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Menus / Update</li>
    </ol>

    <div class="row gx-5 py-md-5 justify-content-center">
      <div class="col-md-4 py-md-4">
        <form class="form-container py-md-4" action="index.php?page=menus/update&id=<?= $kode_menu; ?>" method="POST">
          <div class="mb-3">
            <label for="kode_menu" class="form-label">Kode Menu</label>
            <input type="text" name="kode_menu" class="form-control" id="kode_menu" value="<?= $menu['kode_menu'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="<?= $menu['nama_menu'] ?>" required>
          </div>
          <div class=" mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="<?= $menu['harga'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="jenis_menu" class="form-label">Jenis Menu</label>
            <select name="jenis_menu" id="jenis_menu" class="form-select" value="<?= $menu['jenis_menu']; ?>">
              <option selected>Pilih Jenis</option>
              <option value="Makanan">Makanan</option>
              <option value="Minuman">Minuman</option>
              <option value="Cemilan">Cemilan</option>
            </select>
            <!-- <input type="role_id" name="role_id" class="form-control" id="role_id" placeholder="Masukkan Password" required> -->
          </div>
          <button type="submit" name="submit" class="btn btn-primary">
            Save
          </button>
        </form>
      </div>
    </div>
  </div>
</main>