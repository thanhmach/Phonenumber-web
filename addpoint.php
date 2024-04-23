<?php
include("./assets/class/database.php");
include("./assets/class/diem.php");

$MaTB = $_POST['MaTB'];
$TongDiem = $_POST['TongDiem'];

$point = new diem();
$point->addPoint($MaTB, $TongDiem);

header("Location: point.php");
exit;