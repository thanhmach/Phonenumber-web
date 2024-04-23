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
                    <h1 class="mt-4 text-center">Edit Number</h1>
                    <?php
                    include("./assets/class/sdt.php");

                    $SDT = $_GET['SDT'];

                    $num = new sdt();
                    $item = $num->getNum($SDT);
                    if ($item) {
                    ?>
                        <div class="d-flex justify-content-center">
                            <form class="card mb-4 w-50" method="POST" action="updatenum.php">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Số điện thoại</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="SDT" value="<?php echo $item['SDT'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Mã Khách hàng</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="MaKH" value="<?php echo $item['MaKH'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Mã thuê bao hiện tại</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $item['MaTB'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Mã thuê bao muốn đổi</label>
                                        <div class="col-md-9">
                                            <?php
                                            include("./assets/class/thuebao.php");
                                            $thuebao = new thuebao();
                                            $comboBoxMaTB = $thuebao->createMaTBComboBox();

                                            echo $comboBoxMaTB;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary mr-2" href="staff.php">Close</a>
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