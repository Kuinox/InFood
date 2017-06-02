<?php
// verifier si le nom existe ou non
 function modifierCompte(PDO $bdd, $valChanger, $nauVal)
{

  $requete = $bdd->query("UPDATE user SET $valChanger = $nauVal WHERE id_user = $id");
}
/************/
include('include.php')
function verifierEtModifier(PDO $bdd)
{
  $id = $_SESSION['user']['id_user'];
  $res = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
  $res->execute(array($id));
  /* Récupère le nombre de lignes qui correspond à la requête SELECT */
  if ($res->fetchColumn() > 0) {
    echo"$nom est exise déja!!!";
  }
  /* Aucune ligne ne correspond -- faire quelque chose d'autre */
  elseif ($res->fetchColumn() == 0) {
    /* Effectue la vraie requête SELECT et travaille sur le résultat */
    $sql = "SELECT * FROM user WHERE pseudo like '$nom'";
    foreach ($bdd->query($sql) as $row) {
      print $row['pseudo'] . " est supprimer \n";
      //si il a trouver le nom il va le supprimer
      modifierCompte($bdd, $valChanger, $nauVal);
   }
 }
}
?>
