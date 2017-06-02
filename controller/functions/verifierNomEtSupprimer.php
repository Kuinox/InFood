<?php
// verifier si le nom existe ou nom
include("supprimerCompte.php");
function verifierNomEtSupprimer(PDO $bdd, $nom)
{

$res = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$res->execute(array($nom));
   /* Récupère le nombre de lignes qui correspond à la requête SELECT */
if ($res->fetchColumn() > 0) {

	  /* Effectue la vraie requête SELECT et travaille sur le résultat */
	  $sql = "SELECT * FROM user WHERE pseudo like '$nom'";
	  foreach ($bdd->query($sql) as $row) {
	  print $row['pseudo'] . " est supprimer \n";
	//si il a trouver le nom il va le supprimer
	  supprimerCompte($bdd, $nom);
	  }
   }
   /* Aucune ligne ne correspond -- faire quelque chose d'autre */
   elseif ($res->fetchColumn() == 0) {
	  echo"$nom pas trouver.";
   }
}
?>
