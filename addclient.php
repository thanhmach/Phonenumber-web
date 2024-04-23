<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/khachhang.php");

$MaKH = $_POST["MaKH"];
$MaNV = $_POST["MaNV"];
$TenKH = $_POST["TenKH"];
$DiaChi = $_POST["DiaChi"];
$CCCD = $_POST["CCCD"];

$TenTK = $_POST["TenTK"];
$MatKhau = $_POST["MatKhau"];

$user = new khachhang();
$user->addUser($MaKH, $MaNV, $TenKH, $DiaChi, $CCCD);

$addUser = new authprocess();
$addUser->addAcUser($MaKH, $TenTK, $MatKhau);

header("Location: client.php");
exit(0);