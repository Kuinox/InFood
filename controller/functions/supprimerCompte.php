<?php
 function supprimerCompte(PDO $bdd, $nom)
{
	//modifier les donners par nulle

	$requete = $bdd->query("UPDATE user SET email=NULL, pseudo=NULL, password=NULL,
    height=NULL, weight=NULL WHERE pseudo='$nom'");
}
?>
