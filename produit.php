<?php
include ('connect.php');
include ('sql_functions.php');
$table = $_GET['filtre'];
$where = "id_aliment";
$like = "'".$_GET['id']."'";

$result = mysqli_query($bdd, "SELECT * FROM $table WHERE $where LIKE $like ;");
$output = [];
while ($select = mysqli_fetch_assoc($result)) {
    $output [] = $select;
}
var_dump($output);



 ?>
