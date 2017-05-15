<?php
session_start();
include("controller/SQL/FUNCTIONS/connect.php");
include('comments.php');

$note = $_POST['vote'];
$id = $_SESSION["id"];
$filtre = $_SESSION["filtre"];
$id_user = 1;
if ($note <= 5){
    add_note($bdd,$note,$id,$id_user);
    header("location:produit.php?id=".$id."&filtre=".$filtre."");
}else {
  echo "c'est pas bien de tricher ";
  echo "<br><a href = index>retour</a>";
}



?>
