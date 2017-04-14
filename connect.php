<?php
@mysql_connect('localhost','root','') or die("Erreur d'accès à la BDD.");
@mysql_select_db('infood') or die('Echec de sélection de la base.');
?>
