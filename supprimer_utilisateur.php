<?php
include("view/supprimer_utilisateur.html");

if(isset($_POST['supprimer']))
{	
	$nom=$_POST['nom'];
	// echo $nom."<br>";
	include("controller/functions/verifier_si_existe.php");
	verifier_nom("$nom");
}


?>