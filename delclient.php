<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/khachhang.php");

$MaKH = $_GET["MaKH"];

$staff = new khachhang();
$staff->delUser($MaKH);

$addStaff = new authprocess();
$addStaff->delAcUser($MaKH);

header("Location: client.php");
exit(0);