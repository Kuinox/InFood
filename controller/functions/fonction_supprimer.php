<?php
 function supprimer_compte($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET email='nulle', pseudo='nulle', password='nulle', email='nulle', height='0', weight='0' WHERE pseudo='$nom'");  
}
?>
