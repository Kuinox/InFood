<?php
include ("controller/SQL/FUNCTIONS/connect.php");
include ('sql_functions.php');
$table = $_GET['filtre'];
$where = "label";
$like = "'".$_GET['id']."'";
echo $where;
echo "<br>";
echo $like;
$result = select ($bdd, $table, $where, $like);
var_dump($result);
?>
