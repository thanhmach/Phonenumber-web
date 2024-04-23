<?php
include("./assets/class/database.php");
include("./assets/class/sdt.php");
include("./assets/class/thuebao.php");

$MaTB = $_POST['MaTB'];
$SDT = $_POST['SDT'];

$sub = new thuebao();
$Diem = $sub->getPoint($MaTB); 
$ThoiHan = $sub->getTerm($MaTB);

$sdt = new sdt();
$DiemTong = $sdt->calculateTotalPoints($Diem);
$NgayDK = $sdt->calculateRegistrationDate();
$NgayHH = $sdt->calculateExpirationDate($ThoiHan, $NgayDK);
$sdt->updateNum($MaTB, $SDT, $NgayDK, $NgayHH, $DiemTong);

header("Location: viewnum.php?MaKH=" . urlencode($MaKH));
exit;