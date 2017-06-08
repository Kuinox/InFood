<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");

$result = select ($bdd, "allergen", "id", $_GET['id']);
if (empty($result)) {
    echo "Allergène introuvable !";
} else {
    echo "<h1>".$result['0']['label']."</h1><br>";
}
$recherche = recherche($bdd, "aliment_allergen");
displayRecherche($recherche);
include("model/bot.php");
?>
