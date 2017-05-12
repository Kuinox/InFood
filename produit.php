<?php
  session_start();
include('comments.php');

<<<<<<< HEAD
include ("controller/SQL/FUNCTIONS/connect.php");
=======
include("controller/SQL/FUNCTIONS/connect.php");
>>>>>>> bee4044... j'ai changer
include ('sql_functions.php');
$table = $_GET['filtre'];
$where = "id_aliment";
$like = "'".$_GET['id']."'";
$_SESSION["filtre"] = $table;

echo $where;
echo "<br>";
echo $like;
$result = select ($bdd, $table, $where, $like);
var_dump($result);
foreach ($result as $key => $value) {
  $chaine = implode(";", $value);
  $array = explode (";",$chaine);
  echo $array[1];
  echo "<br>";
  echo $array[0];

    $_SESSION["prod"] = $array[1];
    $_SESSION["id"] = $array[0];
}

$like = $_SESSION['id'];
$test = comments($bdd,$like);
var_dump($test);

echo('<br><a href = produit.html>suivant</a>');
 ?>
