<?php
include ('connect.php');
include ('sql_functions.php');
$recherche = $_GET['recherche'];
var_dump ($recherche);
$filtre = $_GET['filtre'];
var_dump($filtre);
$table = $filtre;

if($filtre == 'aliment'){
  $array =[];
  $array = explode (" ",$recherche);
  $output = [];
  foreach ($array as $key => $value) {
    $output[] = "%".$value."%";
  }
  $recherche = implode("",$output);

  var_dump($output);
  var_dump($recherche);
  $where = 'name_aliment';
  $like = "'".$recherche."'";
  $result =mysqli_query($bdd, "SELECT g.label , a.name_aliment, a.id_aliment
      FROM aliment a
      LEFT OUTER JOIN generic_name g
      ON g.id = a.generic_name_id
      WHERE a.name_aliment LIKE '$recherche';");

  }else if($filtre == 'additive') {
  $where = "label";
  $like ="'en:".$recherche."'";
}else if ($filtre == 'ingredients') {
  $where = "label";
  $like = "'".$recherche."'";
}
$result2 = select ($bdd, $table, $where, $like);
$output2 = [];
while ($select = mysqli_fetch_assoc($result)) {
    $output2 [] = $select;
}
//foreach ($variable as $key => $value) {
//  echo "<a href= 'produit.php?id=' a>"$output2[]
//}
//foreach ($output2 as $key => $value) {
  //echo "<a href= $output2[$key] >pp</a>";
//}
foreach ($output2 as $key => $value) {
  $test = implode(";", $value);
  $test = explode (";",$test);
  echo "<a href= produit.php?id=$test[2]&filtre=$filtre>$test[1]</a><br>";
}
?>
