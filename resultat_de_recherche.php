<?php
include ('connect.php');
include ('sql_functions.php');
$recherche = $_POST['recherche'];
var_dump ($recherche);
$filtre = $_POST['filtre'];
var_dump($filtre);
$table = $filtre;
if($filtre == 'aliment'){
  $where = 'name_aliment';
}else{
  $where = "label";
}
if($filtre == 'additive'){
  $like ="'en:".$recherche."'";
}
$like = "'".$recherche."'";
echo "<pre>";
print_r (select ($bdd, $table, $where, $like));
echo "</pre>";

?>
