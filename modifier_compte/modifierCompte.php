<?php
// verifier si le nom existe ou non
session_start();
include("../controller/SQL/FUNCTIONS/connect.php");
//SQL
include('modifierCompte.html');
function modifierCompte(PDO $bdd, $toto, $nouVal)
	{
	  $id = $_SESSION['user']['id_user'];
<<<<<<< HEAD
=======
	//  var_dump($id);
		if ($toto == "password")
		{
			$nouVal=hash('sha256',$_POST["password"]);//hash mot de passe
		}
>>>>>>> feature/modif_compte
	  $requete = $bdd->query("UPDATE user SET $toto='$nouVal' WHERE id_user='$id'");
	}

if(isset($_SESSION['user']))
{
	if(isset($_POST['Modifer']))
	{
		if(isset($_POST['pseudo']))
		{
			$toto='pseudo';
			$nom=$_POST['pseudo'];
			$_SESSION['pseumail']="$toto";
			verifierEtModifer($bdd, $nom);
		}
		if(isset($_POST['password']))
		{
			$toto='password';
			$nom=$_POST['password'];
			modifierCompte($bdd,$toto,$nom);
			echo $nom." est le nouveau $toto ";
		}
		if(isset($_POST['email']))
		{
			$toto='email';
			$nom=$_POST['email'];
			$_SESSION['pseumail']="$toto";
			verifierEtModifer($bdd, $nom);
		}
		if(isset($_POST['height']))
		{
			$toto='height';
			$nom=$_POST['height'];
			modifierCompte($bdd,$toto,$nom);
			echo $nom." est le nouveau $toto ";
		}
		if(isset($_POST['weight']))
		{
			$toto='weight';
			$nom=$_POST['weight'];
			modifierCompte($bdd,$toto,$nom);
			echo $nom." est le nouveau $toto ";
		}

		$_SESSION['user']["$toto"]=$nom;
			}
	else
	{
		echo "i am sorry";
	}
}
/**************/
// verifier si le nom existe ou nom
function verifierEtModifer(PDO $bdd, $nauveaunom)
{
<<<<<<< HEAD
  $id = $_SESSION['user']['id_user'];
  $res = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
  $res->execute(array($id));
  //  Récupère le nombre de lignes qui correspond à la requête SELECT
  if ($res->fetchColumn() > 0) {
    echo"$nom est exise déja!!!";
  }
  //  Aucune ligne ne correspond -- faire quelque chose d'autre
  elseif ($res->fetchColumn() == 0) {
    //  Effectue la vraie requête SELECT et travaille sur le résultat
    $sql = "SELECT * FROM user WHERE pseudo like '$nom'";
    foreach ($bdd->query($sql) as $row) {
      print $row['pseudo'] . " est supprimer \n";
      //si il a trouver le nom il va le supprimer
      modifierCompte($bdd, $valChanger, $nauVal);
   }
 }
}*/
=======
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

var_dump($_SESSION['user']);
	  }
	}
}
var_dump($_SESSION['user']);


>>>>>>> feature/modif_compte
?>
