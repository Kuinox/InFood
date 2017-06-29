<?php

include(__DIR__."../../view/adminModifvue2.php");
include("../controller/SQL/FUNCTIONS/connect.php");

function modifierCompte(PDO $bdd, $toto, $nouVal)
	{
	  $id = $_SESSION['user2']['id_user'];
		$_SESSION['user2']["$toto"]=$nouVal;

$res = $bdd->prepare("UPDATE user SET $toto=? WHERE id_user=? ");
$res->execute(array($nouVal, $id));

	}
function modifierModPass(PDO $bdd, $adminmdp, $password)
 {
   $admin=hash('sha256',$adminmdp);//hash mot de passe
   $namead=$_SESSION['user']['pseudo'];
   $id2=$_SESSION['user2']['id_user'];
   $res = $bdd->prepare("SELECT * FROM user WHERE password = ? AND pseudo = ?");
 	$res->execute(array($admin, $namead));
  $nauveaumdp=hash('sha256',$_POST["password"]);//hash mot de passe
     if ($res->fetchColumn() > 0) {
			/**/
			 $res = $bdd->prepare("UPDATE user SET password =? WHERE id_user=?");
		 	$res->execute(array($nauveaumdp, $id2));
       /***/
       $_SESSION['user2']['password'] = $nauveaumdp;
       echo"mot de passe est changer";
//			 var_dump($_SESSION['user2']);
   		  }
   	   elseif ($res->fetchColumn() == 0) {
   			 echo"le mot de passe d'admine pas bonne";
   	   	}
 }
function modifierGrade(PDO $bdd,$grade){
	$id2=$_SESSION['user2']['id_user'];
	
	if($grade=="utilisateur"){
		$gradepar="1";
	}
	else if ($grade=="admin"){
		$gradepar="2";
	}
	var_dump($id2);
	$res = $bdd->prepare("UPDATE grade_user SET grade_id_grade =? WHERE id=?");
	$res->execute(array($gradepar, $id2));
	$_SESSION['user2']['name_grade']=$grade;
	echo "grade est changé avec succés";

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
			 $res = $bdd->prepare("UPDATE user SET $pseumail =? WHERE id_user=?");
			 $res->execute(array($nauveaunom, $id));



			$_SESSION['user2']["$pseumail"] = $nauveaunom;
			echo" le nouveau $pseumail est $nauveaunom";
	//var_dump($_SESSION['user2']);

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
  $nom=intval($_POST['height']);
	if($nom=="0")
	{
		echo "erreur!! veillez entrer un nombre ";
	}
	else{
  	modifierCompte($bdd,$toto,$nom);
  	echo $nom." est le nouveau $toto ";
		}
  }
  if(isset($_POST["weight"])){
		$nom=intval($_POST['weight']);
		if($nom=="0")
		{
			echo "erreur!! veillez entrer un nombre ";
		}
		else
		{
    	$toto='weight';
    	modifierCompte($bdd,$toto,$nom);
    	echo $nom." est le nouveau $toto ";
		}
  }
  if(isset($_POST["grade"])){
		$grade=$_POST["grade"];
		if($grade=="utilisateur" || $grade== "admin")
		{
			modifierGrade($bdd,$grade);
		}
		else
		{
			echo"utilisateur ou admin seulement";
		}
  }
  if(isset($_POST["aPassword"])){
		$admin=$_POST["aPassword"];
    if($_POST["password"]==$_POST["cPassword"])
    {
			$password=$_POST["password"];
      modifierModPass($bdd, $admin, $password);
    }
    else
    {
      echo"Le Mot De Passe pas même dans les deux champs!!!  ";
    }
  }

}
//var_dump($_SESSION['user2']);
$user2=$_SESSION['user2'];
var_dump($user2);
echo"<br> Le nom est ".$user2['pseudo']."<br>";
echo" L'email est ".$user2['email']."<br>";
echo" Le weight est ".$user2['weight']."<br>";
echo" Le height est ".$user2['height']."<br>";
echo" Le grade est ".$user2['name_grade']."<br>";
?>
