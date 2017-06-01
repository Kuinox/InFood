<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("view/functions/displayComments.php");
include("controller/SQL/FUNCTIONS/infoAliment.php");
include("view/functions/displayTable.php");
include("controller/SQL/FUNCTIONS/comments.php");
include("controller/functions/commenterEtVoter.php");
echo "<pre>";
$result = select ($bdd, "aliment", "id_aliment",$_GET['id']);
if (empty($result)) {
    echo "Aliment introuvable !";
} else {
    $id_aliment = $result[0]['id_aliment'];
    $nutri = nutriments($bdd, $id_aliment);
    $additives = additives($bdd, $id_aliment);
    $brand = brand($bdd,$id_aliment);
    $packaging = packaging($bdd,$id_aliment);
    $place = manufact_place($bdd,$id_aliment);
    $allergen = allergen($bdd,$id_aliment);
    displayAllergen($allergen);
    displayName($result);
    displayPlace($place);
    displayPackaging($packaging);
    displayBrand($brand);
    displayAdditives($additives);
    displayNutri($nutri);
    displayComments(getComments($bdd,$_GET['id']));
    include("view/afficherFormVoteComment.php");
}
include("model/bot.php");
?>
