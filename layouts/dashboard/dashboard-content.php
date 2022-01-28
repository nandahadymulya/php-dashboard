<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
    case 'dashboard': // $page == dashboard (jika isi dari $page adalah dashboard)
        include "dashboard.php"; // load file dashboard.php yang ada di folder dashbo
        break;

    case 'login': // $page == login (jika isi dari $page adalah login)
        include "../../pages/login.php"; // load file login.php yang ada di folder pages
        break;

    case 'logout': // $page == login (jika isi dari $page adalah login)
        include "../../../pages/logout.php"; // load file login.php yang ada di folder pages
        break;

    case 'register': // $page == register (jika isi dari $page adalah register)
        include "../../pages/register.php"; // load file register.php yang ada di folder pages
        break;

    case 'register1': // $page == register (jika isi dari $page adalah register)
        include "../../pages/register1.php"; // load file register.php yang ada di folder pages
        break;

    case 'jadwal': // $page == pesangedung (jika isi dari $page adalah pesangedung)
        include "pages/jadwal.php"; // load file register.php yang ada di folder pages
        break;

    case 'cetak': // $page == pesangedung (jika isi dari $page adalah pesangedung)
        include "pages/cetak.php"; // load file register.php yang ada di folder pages
        break;

    default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
        include "dashboard.php";
}
