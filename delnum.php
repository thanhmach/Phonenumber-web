<?php
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
include("./assets/class/sdt.php");

$SDT = $_GET["SDT"];

$num = new sdt();
$num->delNum($SDT);

header("Location: viewnum.php?MaKH=" . urlencode($MaKH));
exit(0);