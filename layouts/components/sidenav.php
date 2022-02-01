<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link <?php if ($_GET['page'] == 'dashboard') echo 'active' ?>" href="index.php?page=dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <?php if ($_SESSION['role_id'] == 1) : ?>
                <a class="nav-link <?php if ($_GET['page'] == 'users') echo 'active' ?>" href="index.php?page=users">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <a class="nav-link <?php if ($_GET['page'] == 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>

            <?php elseif ($_SESSION['role_id'] == 2) : ?>
                <a class="nav-link <?php if ($_GET['page'] == 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>

            <?php elseif ($_SESSION['role_id'] == 3) : ?>
                <a class="nav-link <?php if ($_GET['page'] == 'employees') echo 'active' ?>" href="index.php?page=employees">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>

            <?php endif; ?>
        </div>
    </div>
</nav>