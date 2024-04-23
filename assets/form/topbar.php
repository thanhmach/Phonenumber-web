<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?php if ($_SESSION['auth_role'] == '0') : ?>
        <!-- Navbar Brand -->
        <a class="navbar-brand ps-3 text-center" href="dashboard.php">Five Seven</a>
    <?php elseif ($_SESSION['auth_role'] == '1') : ?>
        <a class="navbar-brand ps-3 text-center" href="dashboard.php">Five Seven</a>
    <?php elseif ($_SESSION['auth_role'] == '2') : ?>
        <a class="navbar-brand ps-3 text-center" href="dashboard.php">Five Seven</a>
    <?php endif; ?>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <?php if (isset($_SESSION['auth_user'])) : ?>
        <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
            <span class="text-light me-3">Welcome, <?= $_SESSION['auth_user']['user_name'] ?></span>
            <a class="btn btn-link text-light" href="logout.php">Logout</a>
        </div>
    <?php endif; ?>
</nav>