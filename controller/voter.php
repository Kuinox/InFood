<?php
session_start();
include("../controller/SQL/FUNCTIONS/connect.php");
include('../comments.php');

$note = $_POST['vote'];
$id = $_SESSION["id"];
$type = $_SESSION["type"];
$id_user = $_SESSION["id_user"];
if ($note <= 5){
    add_note($bdd,$note,$id,$id_user);
    header("location:../model/produit.php?id=".$id."&type=".$type."");
}else {
    echo "la note doit etre entre 0 et 5 ";
    echo "<br><a href = index>retour</a>";
}



?>
