<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <?php if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '0') : ?>
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Manage</div>
                <a class="nav-link" href="staff.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-user"></i></div>
                    Staff
                </a>
                <a class="nav-link" href="client.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Client
                </a>
                <a class="nav-link" href="sub.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-square-phone"></i></div>
                    Subscriptions
                </a>
                <a class="nav-link" href="point.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-rotate fa-lg"></i></div>
                    Point
                </a>
            <?php elseif (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '1') : ?>
                <a class="nav-link" href="infostaff.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Infomation
                </a>
                <div class="sb-sidenav-menu-heading">Manage</div>
                <a class="nav-link" href="client.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Client
                </a>
                <a class="nav-link" href="sub.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-square-phone"></i></div>
                    Subscriptions
                </a>
            <?php elseif (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '2') : ?>
                <a class="nav-link" href="infouser.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Infomation
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>