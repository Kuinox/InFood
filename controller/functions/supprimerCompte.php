<?php
 function supprimerCompte(PDO $bdd, $nom)
{
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET email='nulle', pseudo='nulle', password='nulle',
    height='0', weight='0' WHERE pseudo='$nom'");
}
?>
