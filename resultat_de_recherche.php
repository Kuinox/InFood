<?php
include("model/top.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
include("controller/functions/rechercheToPattern.php");
include("controller/SQL/FUNCTIONS/connect.php");
displayRecherche(recherche($bdd, rechercheToPattern()));
include("model/bot.php");
?>
