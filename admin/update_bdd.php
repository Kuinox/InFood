<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>InFood</title>
        <link rel="stylesheet" href="../styles.css">
        <script src="../js/ajax.js"></script>
    </head>
    <body>
        <?php
            include("../model/header.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
include_once("../controller/SQL/FUNCTIONS/connectNoUse.php"); ?>
<p>
Met a jour la base de donnée. Le site restera disponible pendant la mis à jour.
</p>

<input id="work_button" type="button" onclick="work('update')" value="Lancer"/>
<div id="progress-output">Not working</div>
<progress id="progress" value="" max="100"></progress>
<?php include("../model/bot.php");
ob_end_flush();
?>
