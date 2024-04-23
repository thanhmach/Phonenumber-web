<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/diem.php");

$MaTB = $_GET["MaTB"];

$point = new diem();
$point->delPoint($MaTB);

header("Location: point.php");
exit(0);