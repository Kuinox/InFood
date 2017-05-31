<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
include("controller/TEST.php");
//include ('sql_functions.php');

$id = $_GET['id'];
echo "<pre>";
$result = select ($bdd, "manufacturing_place", "id_aliment", "'$id'");
if (empty($result)) {
    echo "Lieu de fabrication introuvable !";
} else {
    print_r ($result);
}
echo "</pre>";
$recherche = recherche($bdd, $_GET['id'], "aliment_manufacturing_place");
displayRecherche($recherche);
displayComents();
include("model/bot.php");
?>
