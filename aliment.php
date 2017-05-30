<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include ("controller/TEST.php");
//include ('sql_functions.php');

echo "<pre>";
print_r (select ($bdd, "aliment", "id_aliment",$_GET['id']));
echo "</pre>";
displayComents();
include("model/bot.php");
?>
