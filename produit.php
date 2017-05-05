<?php
  session_start();
include ('connect.php');
include ('sql_functions.php');
$table = $_GET['filtre'];
$where = "id_aliment";
$like = "'".$_GET['id']."'";
	
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
	 
    $_SESSION["nameprod"] = $array[1];
    $_SESSION["id"] = $array[0];
}

 ?>
<form action="gerer_panier.php" method="POST">
<input type="hidden"/>
<input type="submit" name="panier" value="ajouter panier"/>
</form>
