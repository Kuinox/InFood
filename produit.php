<form action="./gerer_panier.php" method="get">
	<input type="hidden"/>
	<input type="submit" name="panier" value="Ajouter au panier"/>
</form>
<?php
session_start();
include('comments.php');
include("controller/SQL/FUNCTIONS/connect.php");
include ('sql_functions.php');


$table = $_GET['type'];
// include ("aj_panier.html");
// if(isset($_POST['forminscription'])){
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

//panier.
//sirine


//sirine

$like = $_SESSION['id'];

$com = comments($bdd,$like);
// A mettre en forme
var_dump($com);
$note_moy = notes($bdd,$like);
var_dump($note_moy);

echo "<br><a href = notes.html>Notes</a>";
echo "<br><a href = produit.html>Commenter</a><br>";

}if(isset($_SESSION["nom"])){
	echo"set ************************************s";
}else{
	echo"not set n,;:!ùosqjfghjhfh";
}
 ?>
