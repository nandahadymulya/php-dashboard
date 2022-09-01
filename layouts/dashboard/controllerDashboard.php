<?php
session_start();

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$status = (isset($_GET['status'])) ? $_GET['status'] : '';

switch ($page) {
    case 'dashboard':

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

    case 'menus':
        include "menus/index.php";
        break;

    case 'menus/create':
        include "menus/create.php";
        break;

    case 'menus/update':
        include "menus/update.php";
        break;

    case 'menus/delete':
        include "menus/delete.php";
        break;

    case 'transactions':
        include "transactions/index.php";
        break;

    case 'transactions/create':
        include "transactions/create.php";
        break;

    case 'transactions/update':
        include "transactions/update.php";
        break;

    case 'transactions/delete':
        include "transactions/delete.php";
        break;

    case 'logout':
        include "../../config/logout.php";
        break;

    default: // Ini untuk set default jika isi dari $page tidak ada
        include "dashboard.php";
}
