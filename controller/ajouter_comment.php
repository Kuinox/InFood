<?php
include("SQL/FUNCTIONS/connect.php");

$text = $_POST['comment'];
  $id = $_SESSION["id"];
  $id_user = $_SESSION['user']['id_user'];

// }
add_comments($bdd,$text,$id,$id_user);
header("location:aliment.php?id=".$id)
?>
