<?php
ob_start();
include("../model/top.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    var_dump($_SESSION);
    header("HTTP/1.1 401 Unauthorized");
    echo "<h1>HTTP/1.1 401 Unauthorized</h1>";
    exit;
}
?>
Page d'administration.
<!--TODO-->
<?php
include("../model/bot.php");
ob_end_flush();
?>
