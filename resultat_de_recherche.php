<?php
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/recherche.php");
include("controller/functions/rechercheToPattern.php");
$recherche = recherche($bdd, rechercheToPattern());
include("model/top.php");
include("model/functions/displayRecherche.php");
displayRecherche($recherche);
include("model/bot.php");
?>
