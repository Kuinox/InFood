<?php
if(isset($_POST['supprimer']))
{
  $nom=$_POST['nom'];
  // echo $nom."<br>";
  include("../controller/functions/verifierNomEtSupprimer.php");
  verifierNomEtSupprimer($bdd, $nom);
}
?>
