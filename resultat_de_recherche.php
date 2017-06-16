<?php
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/recherche.php");
include("model/functions/dumbRecherche.php");
$recherche = recherche($bdd);
if(empty($recherche)) {
    $recherche = dumbRecherche($bdd);
}
include("model/top.php");
include("model/functions/displayRecherche.php");
//var_dump($recherche);
displayRecherche($recherche);
include("model/bot.php");
?>
