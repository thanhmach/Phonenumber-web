<?php
session_start();
include("./assets/form/link.php");
include("./assets/class/database.php");
include("./assets/tables/submodal.php");

if (!isset($_SESSION['auth']) || $_SESSION['auth'] === null) {
    header("Location: login.php");
    exit(0);
}
?>

<body class="sb-nav-fixed">
    <?php include("./assets/form/topbar.php"); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include("./assets/form/navbar.php"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">View Subscriptions</h1>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <i class="fa-solid fa-table fa-2xl"></i>
                            </div>
                            <div>
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            include("./assets/class/thuebao.php");

                            $staff = new thuebao();
                            $staff->viewTB()
                            ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include("./assets/form/footer.php"); ?>
        </div>
    </div>
</body>