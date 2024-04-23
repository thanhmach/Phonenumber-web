<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/thuebao.php");

$MaTB = $_POST["MaTB"];
$TenTB = $_POST["TenTB"];
$ThoiHan = $_POST["ThoiHan"];
$Diem = $_POST["Diem"];

$sub = new thuebao();
$sub->updateSub($MaTB, $TenTB, $ThoiHan, $Diem);

header("Location: sub.php");
exit(0);