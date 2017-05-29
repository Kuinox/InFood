<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("controller/TEST.php");
//include ('sql_functions.php');

$id = $_GET['id'];
echo "<pre>";
print_r (select ($bdd, "brand", "id_aliment", "'$id'"));
echo "</pre>";
displayComents();
include("model/bot.php");
?>
