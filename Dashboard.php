<?php
session_start();
include("./assets/form/link.php");
include("./assets/class/database.php");

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
                    <h1 class="mt-4 text-center">Dashboard</h1>
                    <div class="row">
                        <div class="col-xl-4 col-md-8">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số khách hàng</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a>
                                        <?php
                                        include("./assets/class/khachhang.php");

                                        $totalNV = new khachhang();
                                        $totalNV->totalUser();
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-8">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Tổng số thuê bao</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a>
                                        <?php
                                        include("./assets/class/thuebao.php");

                                        $totalNV = new thuebao();
                                        $totalNV->totalSub();
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-8">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Tổng số nhân viên</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a>
                                        <?php
                                        include("./assets/class/nhanvien.php");

                                        $totalNV = new nhanvien();
                                        $totalNV->totalStaff();
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <img src="./assets/img/banner.jpg" style="max-height: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include("./assets/form/footer.php"); ?>
        </div>
    </div>
</body>