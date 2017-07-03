<?php
include("model/top.php");
include('controller/SQL/FUNCTIONS/connect.php');
include('controller/SQL/FUNCTIONS/select.php');
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
include("model/jsons/json_parse.php");
echo "<br>";
$result = select ($bdd, 'additives', 'num', $_GET['id']);
echo "<h1>".$result[0]['name']."</h1>";
echo $result[0]['products']." aliments contiennent cet additif.";
$recherche = recherche($bdd,"aliment_additives");

displayRecherche($recherche);
include("model/bot.php");
?>
