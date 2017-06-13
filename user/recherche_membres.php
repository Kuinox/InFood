<?php
include("../model/top.php");
include("../controller/SQL/FUNCTIONS/connect.php");
include("../controller/SQL/FUNCTIONS/select.php");
include("../model/functions/recherche.php");
include("../model/functions/displayRecherche.php");
//include ('sql_functions.php');
$recherche = recherche($bdd, $_GET['type'], "membres");
$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/user?id=";
foreach ($recherche as $value) {
    $pseudo = $value['pseudo'];
    echo "<a href=$path$pseudo>$pseudo</a></br>";
}
include("../model/bot.php");
?>
