<?php
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/recherche.php");

$recherche = recherche($bdd);
include("model/top.php");
include("model/functions/displayRecherche.php");
displayRecherche($recherche);
include("model/bot.php");
?>
