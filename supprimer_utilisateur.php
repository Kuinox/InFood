<?php
session_start();
include("controller/SQL/FUNCTIONS/connect.php");
if($_SESSION['user']['name_grade'] == 'admin') {

include("view/supprimer_utilisateur.html");

	if(isset($_POST['supprimer']))
	{
		$nom=$_POST['nom'];
		// echo $nom."<br>";
		include("controller/functions/verifier_si_existe.php");
		verifier_nom($bdd, $nom);
	}
}



?>
