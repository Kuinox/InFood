<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");


$result = select ($bdd, "categorie", "id", $_GET['id']);
if (empty($result)) {
    echo "Catégorie introuvable !";
} else {
    echo $result['0']['label']."<br>";
}

$recherche = recherche($bdd, $_GET['id'], "aliment_categorie");
displayRecherche($recherche);
include("model/bot.php");
?>
