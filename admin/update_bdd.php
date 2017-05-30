<?php
ob_start();
include("../model/top.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
include_once("../controller/SQL/FUNCTIONS/connectNoUse.php"); ?>
<p>
Met a jour la base de donnée. Le site restera disponible pendant la mis à jour.
</p>

<input type="button" onclick="work()" value="Work"/>
<div id="progress-output">Not working</div>
<progress id="progress" value="" max="100"></progress>
<?php include("../model/bot.php");
ob_end_flush();
?>
