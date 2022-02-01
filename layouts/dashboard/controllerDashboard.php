<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$status = (isset($_GET['status'])) ? $_GET['status'] : '';

switch ($page) {
    case 'dashboard':
        $menu = 'dashboard';
        include "dashboard.php";
        break;

    case 'users':
        include "users/index.php";
        break;

    case 'users/create':
        include "users/create.php";
        break;

    case 'users/update':
        include "users/update.php";
        break;

    case 'users/delete':
        include "users/delete.php";
        break;

    case 'employees':
        include "employees/index.php";
        break;

    case 'logout':
        include "../../config/functionLogout.php";
        break;

    default: // Ini untuk set default jika isi dari $page tidak ada
        include "dashboard.php";
}
