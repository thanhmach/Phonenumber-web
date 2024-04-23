<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/nhanvien.php");

$MaNV = $_POST["MaNV"];
$TenNV = $_POST["TenNV"];
$SDT = $_POST["SDT"];
$Gmail = $_POST["Gmail"];

$staff = new nhanvien();
$staff->updateStaff($MaNV, $TenNV, $SDT, $Gmail);

header("Location: staff.php");
exit(0);