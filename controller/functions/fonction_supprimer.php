<?php function supprimer_compte($nom)
{
  $bdd = new PDO('mysql:host=localhost;dbname=infood', 'root', '');  
  UPDATE user SET pseudo=NULL, password=NULL, email=NULL, height=NULL, weight=NULL where pseudo like "$nom";
}
?>
