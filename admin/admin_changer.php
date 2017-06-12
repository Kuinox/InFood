<?php

include(__DIR__."../../view/adminModifvue2.php");
//include(__DIR__."../../model/admin_modif2.php");
include("../controller/SQL/FUNCTIONS/connect.php");
//session_start();
function modifierCompte(PDO $bdd, $toto, $nouVal)
	{
	  $id = $_SESSION['user2']['id_user'];
		$_SESSION['user2']["$toto"]=$nouVal;
		var_dump($_SESSION['user2']);

	  $requete = $bdd->query("UPDATE user SET $toto='$nouVal' WHERE id_user='$id'");
	}
function modifierModPass($adminmdp, $password)
 {
   $admin=hash('sha256',$adminmdp);//hash mot de passe
   $namead=$_SESSION['user']['pseudo'];
   $id2=$_SESSION['user2']['id_user'];
   $res = $bdd->prepare("SELECT * FROM user WHERE password = ? AND pseudo = $namead");
 	$res->execute(array($admin));
  $nauveaumdp=hash('sha256',$_POST["password"]);//hash mot de passe
     if ($res->fetchColumn() > 0) {
       //n5dm l5dma
       $requete = $bdd->query("UPDATE user SET password ='$nauveaumdp' WHERE id_user='$id2'");
       $_SESSION['user2']['password'] = $nauveaumdp;
   		  }
   	   elseif ($res->fetchColumn() == 0) {
   			 echo"le mot de passe d\'admine pas bonne";
   	   	}
 }

function verifierEtModifer(PDO $bdd, $toto, $nauveaunom)
{
	$pseumail = $_SESSION['pseumail'];
	$id=$_SESSION['user2']['id_user'];

	$res = $bdd->prepare("SELECT * FROM user WHERE $pseumail = ?");
	$res->execute(array($nauveaunom));

	if ($res->fetchColumn() > 0) {

			echo " le $pseumail existe";
		  }

	   elseif ($res->fetchColumn() == 0) {


		$requete = $bdd->query("UPDATE user SET $pseumail ='$nauveaunom' WHERE id_user='$id'");


			$_SESSION['user2']["$pseumail"] = $nauveaunom;
			echo" le nouveau $pseumail est $nauveaunom";
	var_dump($_SESSION['user2']);

	}
	}

if (isset($_POST['Modifer']))
{
  if(isset($_POST["pseudo"])){
    $toto='pseudo';
    $nom=$_POST['pseudo'];
    $_SESSION['pseumail']="$toto";
    verifierEtModifer($bdd, $toto, $nom);
  }
  if(isset($_POST["email"])){
    $toto='email';
    $nom=$_POST['email'];
    $_SESSION['pseumail']="$toto";
    verifierEtModifer($bdd, $toto, $nom);
  }
  if(isset($_POST["height"])){
  $toto='height';
  $nom=$_POST['height'];
  modifierCompte($bdd,$toto,$nom);
  echo $nom." est le nouveau $toto ";
  }
  if(isset($_POST["weight"])){
    $toto='weight';
    $nom=$_POST['weight'];
    modifierCompte($bdd,$toto,$nom);
    echo $nom." est le nouveau $toto ";
  }
  if(isset($_POST["grade"])){

  }
  if(isset($_POST["aPassword"])){

    if($_POST["password"]==$_POST["cPassword"])
    {
      modifierModPass($_POST["aPassword"], $_POST["password"]);
    }
    else
    {
      echo"Le Mot De Passe pas même dans les deux champs!!!  ";
    }
  }

}
var_dump($_SESSION['user2']);

?>
