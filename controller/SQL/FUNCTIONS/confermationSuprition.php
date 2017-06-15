<?php
function verifiermdp(PDO $bdd, $mdp)
{
	$id=$_SESSION['user']['id_user'];
	$mdp2=hash('sha256',$mdp);//hash mot de passe

	$res = $bdd->prepare("SELECT * FROM user WHERE id_user = ? AND password=?");
	$res->execute(array($id, $mdp2));

	if ($res->fetchColumn() > 0) {
		include(__DIR__."/../../supprimerMonCompte.php");
		echo"votre compte a été supprimer";
  }

 elseif ($res->fetchColumn() == 0) {
   echo "wrong password!!!";
 }
}
?>
