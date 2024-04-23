<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/nhanvien.php");

$MaNV = $_POST["MaNV"];
$TenNV = $_POST["TenNV"];
$SDT = $_POST["SDT"];
$Gmail = $_POST["Gmail"];

$TenTK = $_POST["TenTK"];
$MatKhau = $_POST["MatKhau"];

$staff = new nhanvien();
$staff->addStaff($MaNV, $TenNV, $SDT, $Gmail);

$addStaff = new authprocess();
$addStaff->addAcStaff($MaNV, $TenTK, $MatKhau);

header("Location: staff.php");
exit(0);