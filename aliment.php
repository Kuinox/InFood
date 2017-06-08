<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("view/functions/displayComments.php");
include("controller/SQL/FUNCTIONS/infoAliment.php");
include("view/functions/displayTable.php");
include("controller/SQL/FUNCTIONS/comments.php");
include("controller/functions/commenterEtVoter.php");
include("model/functions/OnlineProduct.php");

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
    $ingredients = ingredients($bdd, $id_aliment);
    $note = notes($bdd, $id_aliment);
    $nbNote = nbNotes($bdd, $id_aliment);
    $product = new OnlineProduct($bdd, $_GET['id']);
    $product->displayImage("front");
    $product->displayImage("nutrition");
    $product->displayImage("ingredients");

    displayName($result);
    if ($pref->getEnable()) {
        if ($pref->isPrefAdded($_GET['id'])) {
            echo "<form action='' method='POST'>
                        <input type='hidden' name='action' value='delPref'/>
                        <input type='hidden' name='id' value='".$_GET['id']."'/>
                        <input type='submit' value=\"Supprimer de la l'iste des indésirables\" />
                    </form>";
        } else {
            echo "<form action='' method='POST'>
                        <input type='hidden' name='action' value='addPref'/>
                        <input type='hidden' name='id' value='".$_GET['id']."'/>
                        <input type='submit' value=\"ajouter en tant  qu'indésirable\" />
                    </form>";
        }
    }


    echo "Code Barre: ".$_GET['id'];
<<<<<<< HEAD
    diplaysNote($note);
    diplaysNbNote($nbNote); 
=======
    $product->displayLabelImage();
>>>>>>> fb0b4291b99c4c6e442c91737e8914e0a9203826
    displayAllergen($allergen);
    displayPlace($place);
    displayPackaging($packaging);
    displayBrand($brand);
    displayIngredients($ingredients);
    displayAdditives($additives);
    displayNutri($nutri);
    displayGrade(grade($bdd, $id_aliment));
    displayLabel($product->getLabel());

    displayComments(getComments($bdd,$_GET['id']));

    include("view/afficherFormVoteComment.php");
}
include("model/bot.php");
?>
