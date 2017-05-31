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
$result = select ($bdd, "packaging", "id_aliment", "'$id'");
if (empty($result)) {
    echo "Packaging introuvable !";
} else {
    print_r ($result);
}
echo "</pre>";
$recherche = recherche($bdd, $_GET['id'], "aliment_packaging");
displayRecherche($recherche);
displayComents();
include("model/bot.php");
?>
