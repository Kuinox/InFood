<?php

include("../controller/SQL/FUNCTIONS/connect.php");
//include('../view/modifierCompteVue.ph
//session_start();
function modifierCompte(PDO $bdd, $toto, $nouVal)
	{
	  $id = $_SESSION['user2']['id_user'];
		$_SESSION['user2']["$toto"]=$nouVal;
		var_dump($_SESSION['user2']);
	//  var_dump($id);
		if ($toto == "password")
		{
			$nouVal=hash('sha256',$_POST["password"]);//hash mot de passe
		}
	  $requete = $bdd->query("UPDATE user SET $toto='$nouVal' WHERE id_user='$id'");
	}
// verifier si le nom existe ou nom
function verifierEtModifer(PDO $bdd, $toto, $nauveaunom)
{
	$pseumail = $_SESSION['pseumail'];
	$id=$_SESSION['user2']['id_user'];
	$res = $bdd->prepare("SELECT * FROM user WHERE $pseumail = ?");
	$res->execute(array($nauveaunom));
	   /* Récupère le nombre de lignes qui correspond à la requête SELECT */
	if ($res->fetchColumn() > 0) {
			// le $nauveaunom existe
			echo " le $pseumail existe";
		  }

	   /* Aucune ligne ne correspond -- faire quelque chose d'autre */
	   elseif ($res->fetchColumn() == 0) {
			 //il peut le Modifer
			 /* Effectue la vraie requête SELECT et travaille sur le résultat */
		$requete = $bdd->query("UPDATE user SET $pseumail ='$nauveaunom' WHERE id_user='$id'");
	 	  // foreach ($bdd->query($sql) as $row) {
			// 	  print $row['pseudo'] . " est supprimer \n";
			$_SESSION['user2']["$pseumail"] = $nauveaunom;
			echo" le nouveau $pseumail est $nauveaunom";
	var_dump($_SESSION['user2']);
		  // }
	}
	}
	?>
