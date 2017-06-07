<?php
include("model/top.php");
include('controller/SQL/FUNCTIONS/connect.php');
include('controller/SQL/FUNCTIONS/select.php');
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
include("model/jsons/json_parse.php");
echo "<br>";
$result = select ($bdd, 'additive', 'id', $_GET['id']);
echo "<h1>".dataAdditives()[$result[0]['label']]['name']."</h1>";
$recherche = recherche($bdd,"aliment_additive");
displayRecherche($recherche);
include("model/bot.php");
?>
