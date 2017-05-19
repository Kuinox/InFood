<?php
include ("controller/SQL/FUNCTIONS/connect.php");
include ('controller/SQL/FUNCTIONS/select.php');

$recherche = addslashes($_GET['recherche']);
var_dump ($recherche);
$type = addcslashes($_GET['type']);
$_SESSION['type'] = $type; //TODO a quoi sa sert ???

var_dump($type);
$table = $type; //et ca aussi ? Pourquoi créer deux variable avec le meme contenu ???

$array = explode (" ",$recherche);
$output = [];
foreach ($array as $key => $value) {
  $output[] = "%".$value."%";
}


function recherche(mysqli $bdd, array $output, string $type) {
    $recherche = implode("",$output);
    var_dump($output);
    var_dump($recherche);
    $like = "'".$recherche."'";
    switch ($type) {
        case 'aliment':
            $query = "SELECT g.label , a.name_aliment, a.id_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE a.name_aliment LIKE $like;";
            $result = mysqli_query($bdd, $query);
            $output2 = [];
            while ($select = mysqli_fetch_assoc($result)) {
                $output2 [] = $select;
            }
    }
}

if($type == 'aliment')  {
  $recherche = implode("",$output);
  var_dump($output);
  var_dump($recherche);
  $where = 'name_aliment';
  $like = "'".$recherche."'";
  $result = mysqli_query($bdd, "SELECT g.label , a.name_aliment, a.id_aliment
        FROM aliment a
        LEFT OUTER JOIN generic_name g
        ON g.id = a.generic_name_id
        WHERE a.name_aliment LIKE '$recherche';");
  $output2 = [];
  while ($select = mysqli_fetch_assoc($result)) {
      $output2 [] = $select;
  }
  foreach ($output2 as $key => $value) {

    echo "<a href= produit.php?id=$array[2]&type=$type>$array[1]</a><br>";
  }
} else if($type == 'additive') {
    $recherche = implode("",$output);
    var_dump($output);
    var_dump($recherche);
    $where = "label";
    $like = "'".$recherche."'";
    $result = select ($bdd, $table, $where, $like);
    foreach ($result as $key => $value) {
      $id = $array[0];
      $name = $array[1];
      echo "<a href= additive.php?id=$id&type=$type>$name</a><br>";
    }
} else if ($type == 'ingredient') {
  $recherche = implode("",$output);
  var_dump($output);
  var_dump($recherche);
  $where = "label";
  $like = "'".$recherche."'";
  $result = select ($bdd, $table, $where, $like);
  foreach ($result as $key => $value) {
    $chaine = implode(";", $value);
    $array = explode (";",$chaine);
    echo "<a href= ingedient.php?id=$array[0]&type=$type>$array[1]</a><br>";

}
}

?>
