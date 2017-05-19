<?php
session_start();
include("../controller/SQL/FUNCTIONS/connect.php");
include('../controller/SQL/FUNCTIONS/comments.php');

$text = $_POST['comment'];
$check = "\">";

$pos = strpos($text,$check);

// if($pos === false) {
      // header("location: index.php");
// }
// else {

  $id = $_SESSION["id"];
  $type = $_SESSION["type"];
  $id_user = $_SESSION["id_user"];

// }
add_comments($bdd,$text,$id,$id_user);
header("location:../model/produit.php?id=".$id."&type=".$type."")
?>
