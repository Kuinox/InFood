<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");


$result = select ($bdd, "categorie", "num", $_GET['id']);
if (empty($result)) {
    echo "Catégorie introuvable !";
} else {
    echo "<h1>".$result['0']['label']."</h1><br>";
}

$recherche = recherche($bdd, "aliment_categorie");
displayRecherche($recherche);
include("model/bot.php");
?>
