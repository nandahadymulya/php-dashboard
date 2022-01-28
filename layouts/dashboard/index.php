<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/head.php'; ?>
    <?php include '../components/add-css.php'; ?>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <?php include '../components/sidebar.php'; ?>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">

            <?php include '../components/navbar-top.php'; ?>

            <!-- Page content-->
            <?php include 'dashboard-content.php'; ?>
        </div>
        <?php include '../components/dashboard-footer.php'; ?>
        <?php include '../components/add-scripts.php'; ?>
</body>

</html>