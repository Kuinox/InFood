<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("controller/TEST.php");
$id = $_GET['id'];
echo "<pre>";
$prep = $bdd->prepare("SELECT label FROM generic_name WHERE id=?");
$prep->execute(array($id));
print_r ($prep->fetchAll(PDO::FETCH_ASSOC));
echo "</pre>";
displayComents();
include("model/bot.php");
?>
