<?php include ("../model/top.php");
include("../controller/SQL/FUNCTIONS/connect.php");
include("../controller/SQL/FUNCTIONS/confermationSuprition.php");
if(isset($_POST['supp'])){
  $mdp=$_POST['pass'];
  verifiermdp($bdd, $mdp);
}
?>

<form method="post" action="confirmerSuppressionCompte.php">
  <input type="password" placeholder="confirmer votre password" name="pass"/>
  <input type="submit" value="Sumprimer Compte" name="supp"/>
</form>
