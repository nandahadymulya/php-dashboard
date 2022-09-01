<?
session_start();

?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link <?php if ($_GET['page'] === 'dashboard') echo 'active' ?>" href="index.php?page=dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <?php if ($sidenav = 'superadmin') : ?>
                <a class="nav-link <?php if ($_GET['page'] === 'users') echo 'active' ?>" href="index.php?page=users">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <a class="nav-link <?php if ($_GET['page'] === 'transactions') echo 'active' ?>" href="index.php?page=transactions">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Transactions
                </a>
                <a class="nav-link <?php if ($_GET['page'] === 'menus') echo 'active' ?>" href="index.php?page=menus">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Menus
                </a>

            <?php elseif ($sidenav = 'admin') : ?>
                <a class="nav-link <?php if ($_GET['page'] === 'users') echo 'active' ?>" href="index.php?page=users">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <a class="nav-link <?php if ($_GET['page'] === 'transactions') echo 'active' ?>" href="index.php?page=transactions">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Transactions
                </a>
                <a class="nav-link <?php if ($_GET['page'] === 'menus') echo 'active' ?>" href="index.php?page=menus">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Menus
                </a>

            <?php endif ?>
        </div>
    </div>
</nav>