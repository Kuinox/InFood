<?php
// verifier si le nom existe ou nom
include("fonction_supprimer.php");
function verifier_nom(PDO $bdd, $nom)
{

	$sql = "SELECT * FROM user WHERE pseudo like '$nom'";


	if ($res = $bdd->query($sql)) {

	   /* Récupère le nombre de lignes qui correspond à la requête SELECT */
	   if ($res->fetchColumn() > 0) {

		  /* Effectue la vraie requête SELECT et travaille sur le résultat */
		  $sql = "SELECT * FROM user WHERE pseudo like '$nom'";
		  foreach ($bdd->query($sql) as $row) {
		  print $row['pseudo'] . " est supprimer \n";
		//si il a trouver le nom il va le supprimer
		  supprimer_compte($bdd, $nom);
		  }
	   }
	   /* Aucune ligne ne correspond -- faire quelque chose d'autre */
	   elseif ($res->fetchColumn() == 0) {
		  echo"$nom pas trouver.";
	   }
	}
$res = null;
$bdd = null;
}
?>
