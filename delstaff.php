<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/nhanvien.php");

$MaNV = $_GET["MaNV"];

$staff = new nhanvien();
$staff->delStaff($MaNV);

$addStaff = new authprocess();
$addStaff->delAcStaff($MaNV);

header("Location: staff.php");
exit(0);