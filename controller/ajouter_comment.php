<?php
include("SQL/FUNCTIONS/connect.php");
include('SQL/FUNCTIONS/comments.php');

$text = $_POST['comment'];

// if($pos === false) {
      // header("location: index.php");
// }
// else {

  $id = $_SESSION["id"];
  $type = $_SESSION["type"];
  $id_user = $_SESSION['user']['id_user'];

// }
add_comments($bdd,$text,$id,$id_user);
header("location:../aliment.php?id=".$id."&type=".$type."")
?>
