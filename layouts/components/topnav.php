<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <a class="navbar-brand ps-3" href="index.php?page=dashboard">HQ.</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <div class="d-none d-md-inline-block ms-auto">
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="text-capitalize"> <?= $_SESSION['username'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?page=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>