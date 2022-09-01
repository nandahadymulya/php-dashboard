<?php
session_start();

require '../../config/config.php';

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['login'])) {
  header('location: ../../index.php?page=login&status=notlogin');
  exit();
}

$kode = maxPrimary('kode_menu', 'menus', 'MNU');

if (isset($_POST['submit'])) {
  $kode_menu   = htmlspecialchars($_POST['kode_menu']);
  $nama_menu   = htmlspecialchars($_POST['nama_menu']);
  $harga   = htmlspecialchars($_POST['harga']);
  $jenis_menu    = htmlspecialchars($_POST['jenis_menu']);


  $query_create = "INSERT INTO menus (kode_menu, nama_menu, harga, jenis_menu) 
                        VALUES ('$kode_menu', '$nama_menu', '$harga', '$jenis_menu')";

  // var_dump($query_create);
  // die;

  $kode_checker = "SELECT * FROM menus WHERE kode_menu='$kode_menu'";
  $check = mysqli_query($conn, $kode_checker) or die(mysqli_error($conn));

  if (mysqli_num_rows($check) == 0) {
    $create = mysqli_query($conn, $query_create) or die(mysqli_error($conn));

    if ($create) {
      echo '
                <script>
                    alert("Successfully added new Menu!");
                    document.location="index.php?page=menus";
                </script>
            ';
    } else {
      echo '
                <script>
                    alert("Failed add new menu!");
                    document.location="index.php?page=menus";
                </script>
            ';
    }
  } else {
    echo '
            <script>
                alert("Use another kode!");
                document.location="index.php?page=menus/create";
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
      <li class="breadcrumb-item active">Menus / Create</li>
    </ol>

    <div class="row gx-5 py-md-5 justify-content-center">
      <div class="col-md-4 py-md-4">
        <form class="form-container py-md-4" action="index.php?page=menus/create" method="POST">
          <div class="mb-3">
            <label for="kode_menu" class="form-label">Kode Menu</label>
            <input type="text" name="kode_menu" class="form-control" id="kode_menu" value="<?= $kode; ?>" required readonly>
          </div>
          <div class=" mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Masukkan Menu" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan harga" required>
          </div>

          <div class="mb-3">
            <label for="jenis_menu" class="form-label">Jenis</label>
            <select name="jenis_menu" id="jenis_menu" class="form-select">
              <option selected>Pilih Jenis</option>
              <option value="Makanan">Makanan</option>
              <option value="Minuman">Minuman</option>
              <option value="Cemilan">Cemilan</option>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">
            Save
          </button>
        </form>
      </div>
    </div>
  </div>
</main>