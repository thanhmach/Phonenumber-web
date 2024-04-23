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
                    <h1 class="mt-4 text-center">Edit Client</h1>
                    <?php
                    include("./assets/class/khachhang.php");

                    $MaKH = $_GET['MaKH'];

                    $user = new khachhang();
                    $item = $user->getUser($MaKH);
                    if ($item) {
                    ?>
                        <div class="d-flex justify-content-center">
                            <form class="card mb-4 w-50" method="POST" action="updateclient.php">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Mã khách hàng</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="MaKH" value="<?php echo $item['MaKH'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Tên khách hàng</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="TenKH" value="<?php echo $item['TenKH'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Địa chỉ</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="DiaChi" value="<?php echo $item['DiaChi'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Căn cước</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="CCCD" value="<?php echo $item['CCCD'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary mr-2" href="client.php">Close</a>
                                    <button type="submit" class="btn btn-primary ml-2">Save</button>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </main>
            <?php include("./assets/form/footer.php"); ?>
        </div>
    </div>
</body>