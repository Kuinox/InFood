<?php
include("../controller/SQL/FUNCTIONS/connect.php");
session_start();
if(isset($_SESSION['user'])){
  if($_SESSION['user']['name_grade'] == 'utilisateur') {
    include("functions/supprimerCompte.php");
    $nom=$_SESSION['user']['pseudo'];
    supprimerCompte($bdd, $nom);
    session_destroy();
    header('Location:/infood2/index.php');
  }
}
?>
