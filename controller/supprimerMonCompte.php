<?php
include("../controller/SQL/FUNCTIONS/connect.php");

 function supprimerCompte(PDO $bdd, $nom)
{
	$requete = $bdd->query("UPDATE user SET email=NULL, pseudo=NULL, password=NULL,
  height=NULL, weight=NULL WHERE pseudo='$nom'");
}

session_start();
if(isset($_SESSION['user'])){
  if($_SESSION['user']['name_grade'] == 'utilisateur') {
    include("functions/supprimerCompte.php");
    $nom=$_SESSION['user']['pseudo'];
    supprimerCompte($bdd, $nom);
    session_destroy();
    echo"session destroy";
    //header('Location:/infood2/index.php');
  }
}

?>
