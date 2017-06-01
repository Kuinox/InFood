<?php
session_start();

include("../controller/SQL/FUNCTIONS/connect.php");

if($_SESSION['user']['name_grade'] == 'admin') {

	include("../view/supprimerUtilisateur.html");
	include("../controller/SQL/FUNCTIONS/chercherSupprimerCompte.php");

}

?>
