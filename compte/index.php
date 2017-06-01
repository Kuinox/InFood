<?php
ob_start();
include("../model/top.php");
include("../controller/SQL/FUNCTIONS/connect.php");
include("../model/functions/getUserComment.php");
if (!isset($_SESSION['user']) && !isset($_GET['id'])) {
    header("Location: ../");
    exit;
}
if (!isset($_GET['id'])) {
    $_GET['id'] = $_SESSION['user']['pseudo'];
}
echo $_GET['id'];
var_dump(getUserComment($bdd, $_GET['id']));
include("../model/bot.php");
ob_end_flush();
?>
