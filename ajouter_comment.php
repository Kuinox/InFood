<?php
session_start();
include("controller/SQL/FUNCTIONS/connect.php");
include('comments.php');

$text = $_POST['comment'];
$id = $_SESSION["id"];
$filtre = $_SESSION["filtre"];

add_comments($bdd,$text,$id);
header("location:produit.php?id=".$id."&filtre=".$filtre."")
?>
