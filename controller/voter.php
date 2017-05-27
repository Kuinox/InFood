<?php
session_start();
include("SQL/FUNCTIONS/connect.php");
include('SQL/FUNCTIONS/comments.php');

$note = $_POST['vote'];
$id = $_SESSION["id"];
$type = $_SESSION["type"];
$id_user = $_SESSION['user']['id_user'];
if ($note <= 5) {
    $prep = $bdd->prepare("CALL update_note(?, ?, ?)");
    $prep->execute(array($id,$note, $id_user));
  //  add_note($bdd,$note,$id,$id_user);
  //  header("location:../aliment.php?id=".$id."&type=".$type."");
} else {
    echo "la note doit etre entre 0 et 5 ";
    echo "<br><a href = index>retour</a>";
}



?>
