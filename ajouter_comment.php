<?php
session_start();
include('connect.php');
include('comments.php');

$text = $_POST['comment'];
 $id = $_SESSION["id"];
 $filtre = $_SESSION["filtre"];
 echo $id_user = $_SESSION['id_user'];
add_comments($bdd,$text,$id,$id_user);
header("location:produit.php?id=$id&filtre=$filtre");




 ?>
