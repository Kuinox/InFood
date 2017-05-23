<?php
session_start();
include('comments.php');
include("controller/SQL/FUNCTIONS/connect.php");
include ('sql_functions.php');

$table = $_GET['type'];
$where = "id_aliment";
$like = "'".$_GET['id']."'";
$_SESSION["type"] = $table;

$result = select ($bdd, $table, $where, $like);
//var_dump($result);
foreach ($result as $key => $value) {
  $chaine = implode(";", $value);
  $array = explode (";",$chaine);
  echo $array[1];
    $_SESSION["prod"] = $array[1];
    $_SESSION["id"] = $array[0];

$like = $_SESSION['id'];
$com = comments($bdd,$like);
// A mettre en forme
var_dump($com);
$note_moy = notes($bdd,$like);
var_dump($note_moy);

echo "<br><a href = notes.html>Notes</a>";
echo "<br><a href = produit.html>Commenter</a>";
//=========================
$test = comments($bdd,$like);
var_dump($test);
}if(isset($_SESSION["nom"])){
	include("aj_panier.html");
}else{
	echo"<script>alert('si vous êtes connecté tu as le droit d\'accés au panier')</script>";
}
 ?>
