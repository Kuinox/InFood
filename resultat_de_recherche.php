<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/recherche.php");
include("model/functions/dumbRecherche.php");
include("model/functions/getNbResult.php");
include("model/functions/pageDisplay.php");
$recherche = recherche($bdd);
var_dump($recherche);
if(empty($recherche)) {
    die("dumb");
    $recherche = dumbRecherche($bdd);
}

$nb_result = getNbResult($bdd);
include("model/functions/displayRecherche.php");
displayRecherche($recherche);
pageDisplay($nb_result);
include("model/bot.php");
?>
