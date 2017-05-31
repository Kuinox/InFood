<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("controller/TEST.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
echo "<pre>";
$result = select ($bdd, "allergen", "id", $_GET['id']);
if (empty($result)) {
    echo "Allergène introuvable !";
} else {
    print_r ($result);
}
echo "</pre>";
$recherche = recherche($bdd, $_GET['id'], "aliment_allergen");
displayRecherche($recherche);
displayComents();
include("model/bot.php");
?>
