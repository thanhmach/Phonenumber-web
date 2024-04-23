<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/khachhang.php");

$MaKH = $_POST["MaKH"];
$TenKH = $_POST["TenKH"];
$DiaChi = $_POST["DiaChi"];
$CCCD = $_POST["CCCD"];

$staff = new khachhang();
$staff->updateUser($MaKH, $TenKH, $DiaChi, $CCCD);

header("Location: client.php");
exit(0);