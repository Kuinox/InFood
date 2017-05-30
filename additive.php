<?php
include("model/top.php");
include ('model/header.php');
include ('controller/SQL/FUNCTIONS/connect.php');
include ('controller/SQL/FUNCTIONS/select.php');
$like = "'".addslashes($_GET['id'])."'";
echo "<br>";
$result = select ($bdd, 'additive', "id", $like);
var_dump($result);
include("model/bot.php");
?>
