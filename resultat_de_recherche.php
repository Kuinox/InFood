<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/recherche.php");
include("model/functions/dumbRecherche.php");


$recherche = recherche($bdd);
if(empty($recherche)) {
    $recherche = dumbRecherche($bdd);
}

include("model/functions/displayRecherche.php");
displayRecherche($recherche, $bdd);

include("model/bot.php");
?>
