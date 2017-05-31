<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("controller/TEST.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");

echo "<pre>";
$result = select ($bdd, "categorie", "id_aliment", $_GET['id']);
if (empty($result)) {
    echo "Catégorie introuvable !";
} else {
    print_r ($result);
}
echo "</pre>";
$recherche = recherche($bdd, $_GET['id'], "aliment_categorie");
displayRecherche($recherche);
displayComents();
include("model/bot.php");
?>
