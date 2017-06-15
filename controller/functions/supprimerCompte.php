<?php
 function supprimerCompte(PDO $bdd, $nom)
{
	$requete = $bdd->query("UPDATE user SET email=NULL, pseudo=NULL, password=NULL,
  height=NULL, weight=NULL WHERE pseudo='$nom'");
}
?>
