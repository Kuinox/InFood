<?php
include ('connect.php');
include ('sql_functions.php');
$recherche = $_GET['recherche'];
var_dump ($recherche);
$filtre = $_GET['filtre'];
var_dump($filtre);
$table = $filtre;

$array =[];
$array = explode (" ",$recherche);
$output = [];
foreach ($array as $key => $value) {
  $output[] = "%".$value."%";
}
if($filtre == 'aliment')  {
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
  $output2 = [];
  while ($select = mysqli_fetch_assoc($result)) {
      $output2 [] = $select;
  }
  foreach ($output2 as $key => $value) {
    $chaine = implode(";", $value);
    $array = explode (";",$chaine);
    echo "<a href= produit.php?id=$array[2]&filtre=$filtre>$array[1]</a><br>";
  }
}else if($filtre == 'additive') {
    $recherche = implode("",$output);
    var_dump($output);
    var_dump($recherche);
    $where = "label";
    $like = "'".$recherche."'";
    $result = select ($bdd, $table, $where, $like);
    foreach ($result as $key => $value) {
      $chaine = implode(";", $value);
      $array = explode (";",$chaine);
      echo "<a href= additive.php?id=$array[0]&filtre=$filtre>$array[1]</a><br>";
    }
}else if ($filtre == 'ingredient') {
  $recherche = implode("",$output);
  var_dump($output);
  var_dump($recherche);
  $where = "label";
  $like = "'".$recherche."'";
  $result = select ($bdd, $table, $where, $like);
  foreach ($result as $key => $value) {
    $chaine = implode(";", $value);
    $array = explode (";",$chaine);
    echo "<a href= ingedient.php?id=$array[0]&filtre=$filtre>$array[1]</a><br>";

}
}

?>
