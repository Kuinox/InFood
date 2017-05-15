<form action="./gerer_panier.php" method="get">
	<input type="hidden"/>
	<input type="submit" name="panier" value="Ajouter au panier"/>
</form>
<?php
session_start();
include('comments.php');
include ("controller/SQL/FUNCTIONS/connect.php");
include ('sql_functions.php');
// include ("aj_panier.html");
// if(isset($_POST['forminscription'])){

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
//Panier
    $_SESSION["prod"] = $array[1];
    $_SESSION["id"] = $array[0];

//panier.
//sirine


//sirine

$like = $_SESSION['id'];
$test = comments($bdd,$like);
var_dump($test);
}if(isset($_SESSION["nom"])){
	echo"set ************************************s";
}else{
	echo"not set n,;:!ùosqjfghjhfh";
}

echo('<br><a href = produit.html>suivant</a>');
 ?>
