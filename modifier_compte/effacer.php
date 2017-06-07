<?php// verifier si le nom existe ou nom
function verifierEtModifer(PDO $bdd, $toto, $nauveaunom)
{
	$pseumail = $_SESSION['pseumail'];
	$id=$_SESSION['user']['id_user'];
	$res = $bdd->prepare("SELECT * FROM user WHERE $pseumail = ?");
	$res->execute(array($nauveaunom));
	   /* Récupère le nombre de lignes qui correspond à la requête SELECT */
	if ($res->fetchColumn() > 0) {
			// le $nauveaunom existe
			echo " le nom existe";
		  }

	   /* Aucune ligne ne correspond -- faire quelque chose d'autre */
	   elseif ($res->fetchColumn() == 0) {
			 //il peut le Modifer
			 /* Effectue la vraie requête SELECT et travaille sur le résultat */
		$requete = $bdd->query("UPDATE user SET $pseumail ='$nauveaunom' WHERE id_user='$id'");
	 	  foreach ($bdd->query($sql) as $row) {
			// 	  print $row['pseudo'] . " est supprimer \n";
			$_SESSION['user']["$pseumail"] = $nauveaunom;
			echo"wwwwwwwwwwwwwwwaaaaaaaaaayyyyyyyyyyy";
		$_SESSION['user']["$toto"]=$nom;

	var_dump($_SESSION['user']);
		  }
	}
	}

?>