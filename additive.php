<?php
//Display additive page
include ('model/header.php');
include ('controller/SQL/FUNCTIONS/connect.php');
include ('controller/SQL/FUNCTIONS/select.php');
$table = addslashes($_GET['filtre']);
$where = "label";
$like = "'".addslashes($_GET['id'])."'";
echo $where;
echo "<br>";
echo $like;
$result = select ($bdd, $table, $where, $like);
var_dump($result);
?>
