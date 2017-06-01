<?php
 function modifier_compte_pseudo($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET pseudo='$nom'");  
}
function modifier_compte_email($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET email='$nom'");  
}
function modifier_compte_password($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET password='$nom'");  
}
function modifier_compte_height($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET height='$nom'");  
}
function modifier_compte_weight($nom)
{
	//connection au bdd
	$bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', ''); 
	
	//modifier les donners par nulle
	$requete = $bdd->query("UPDATE user SET weight='$nom' WHERE ");  
}
?>
