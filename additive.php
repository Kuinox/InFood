<?php
include("model/top.php");
include('controller/SQL/FUNCTIONS/connect.php');
include('controller/SQL/FUNCTIONS/select.php');
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
echo "<br>";
$result = select ($bdd, 'additive', 'id', $_GET['id']);
echo "<h1>".$result[0]['label']."</h1>";
$recherche = recherche($bdd, $_GET['id'], "aliment_additive");
displayRecherche($recherche);
include("model/bot.php");
?>
