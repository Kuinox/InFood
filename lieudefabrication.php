<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/recherche.php");
include("model/functions/displayRecherche.php");
//include ('sql_functions.php');

$id = $_GET['id'];

$result = select ($bdd, "manufacturing_place", "id", "$id");
if (empty($result)) {
    echo "Lieu de fabrication introuvable !";
} else {
    echo "<h1>".$result['0']['label']."</h1><br>";
}

$recherche = recherche($bdd, "aliment_manufacturing_place");
displayRecherche($recherche);
include("model/bot.php");
?>
