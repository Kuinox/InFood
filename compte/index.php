<?php
ob_start();
include("../model/top.php");
if (!isset($_SESSION['user'])) {
    header("Location: ../");
    exit;
}
echo $_SESSION['user']['pseudo'];
include("../model/bot.php");
ob_end_flush();
?>
