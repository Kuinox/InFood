<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/recherche.php");
include("model/functions/displayRecherche.php");

$id = $_GET['id'];
echo "<pre>";
$result = select ($bdd, "brand", "id", "$id");
if (empty($result)) {
    echo "Marque introuvable !";
} else {
    print_r ($result);
}
echo "</pre>";
$recherche = recherche($bdd, $_GET['id'], "aliment_brand");
displayRecherche($recherche);
include("model/bot.php");
?>
