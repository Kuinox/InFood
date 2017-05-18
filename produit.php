<form action="./gerer_panier.php" method="get">
	<input type="hidden"/>
	<input type="submit" name="panier" value="Ajouter au panier"/>
</form>
<?php
session_start();
include('comments.php');
include("controller/SQL/FUNCTIONS/connect.php");
include ('sql_functions.php');


//recherche id dans la bdd
$like = $_SESSION["nom"];
$result = mysqli_query($bdd,"SELECT id_user FROM user WHERE pseudo LIKE \"$like\";");
$select = mysqli_fetch_assoc($result);
$chaine = implode(";", $select);
$_SESSION["id_user"] = $chaine;


// include ("aj_panier.html");
// if(isset($_POST['forminscription'])){

$where = "id_aliment";
$table = $_GET['type'];
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
}
//panier.
//sirine


//sirine

$like = $_SESSION['id'];
$com = comments($bdd,$like);
// A mettre en forme

echo "<br>Commentaire :";
foreach ($com as $key => $value) {
	$chaine = implode(";", $value);
	$array = explode (";",$chaine);
	//$result = mysqli_query($bdd,"SELECT pseudo FROM user JOIN comments WHERE aliment_id_aliment LIKE \"$like\" AND user_id_user LIKE id_user ;");
	$result = mysqli_query($bdd,"SELECT pseudo FROM user WHERE id_user = $array[4] ;");
	$select = mysqli_fetch_assoc($result);
	$comments = implode(";", $select);
	echo "<br>".$comments;
	echo " : ".$array[2];

}

$note_moy = notes($bdd,$like);
$note_moy = implode(";", $note_moy);
echo "<br>note moyenne: ".$note_moy;

echo "<br><a href = notes.html>Notes</a>";
echo "<br><a href = produit.html>Commenter</a><br>";

if(isset($_SESSION["nom"])){
	echo"set ************************************s";
}else{
	echo"not set n,;:!ùosqjfghjhfh";
}
 ?>
