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
                <a class="nav-link <?php if ($_GET['page'] === 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>


            <?php elseif ($sidenav = 'admin') : ?>
                <a class="nav-link <?php if ($_GET['page'] === 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>


            <?php elseif ($sidenav = 'user') : ?>
                <a class="nav-link <?php if ($_GET['page'] === 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>

            <?php else : ?>

                <a class="nav-link <?php if ($_GET['page'] === 'dashboard') echo 'active' ?>" href="index.php?page=dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

            <?php endif ?>
        </div>
    </div>
</nav>