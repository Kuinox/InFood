<?php
session_start();
include("controller/SQL/FUNCTIONS/connect.php");
include('comments.php');

$text = $_POST['comment'];
$check = "\">";

$pos = strpos($text,$check);

// if($pos === false) {
      // header("location: index.php");
// }
// else {
  $id = $_SESSION["id"];
  $type = $_SESSION["type"];
  $id_user = 1;

// }
add_comments($bdd,$text,$id,$id_user);
header("location:produit.php?id=".$id."&type=".$type."")
?>
