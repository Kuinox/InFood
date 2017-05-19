<?php
$bdd = @mysqli_connect('localhost','root','') or die("Erreur d'accès à la BDD.");
mysqli_set_charset($bdd, "utf8") or die("Erreur chargement charset utf8");
$result = mysqli_query($bdd, "SHOW DATABASES LIKE 'infood'");
$db_exist = !empty(mysqli_fetch_all($result));
mysqli_close($bdd);
 ?>
