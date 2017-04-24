<?php
$bdd = @mysqli_connect('localhost','root','','infood') or die("Erreur d'accès à la BDD.");
mysqli_set_charset($bdd, "utf8") or die("Erreur chargement charset utf8");
?>
