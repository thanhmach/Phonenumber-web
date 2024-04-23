<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/thuebao.php");

$MaTB = $_GET["MaTB"];

$sub = new thuebao();
$sub->delSub($MaTB);

header("Location: sub.php");
exit(0);