<?php

ob_start();
include("../model/top.php");
include("../controller/SQL/FUNCTIONS/connect.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}

include("../view/supprimerUtilisateur.html");
include("../controller/SQL/FUNCTIONS/chercherSupprimerCompte.php");
include("../model/bot.php");
ob_end_flush();
?>
