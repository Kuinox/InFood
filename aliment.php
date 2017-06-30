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
include("view/tweet.html");
echo "<br>";
include("view/win.html");

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
    $labels = label($bdd, $id_aliment);
    $product = new OnlineProduct($bdd, $_GET['id']);
    $product->displayImage("front");



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

    echo"<br><br>";
    echo "Code Barre: ".$_GET['id'];
    echo"<br><br>";
    diplaysNote($note);
    echo"<br>";
    diplaysNbNote($nbNote);
    displayLabelImage($labels);
    displayAllergen($allergen);
    displayPlace($place);
    displayPackaging($packaging);
    displayBrand($brand);
    echo"<br><br>";
    displayIngredients($ingredients);
    $product->displayImage("ingredients");
    echo"<br><br>";
    displayAdditives($additives);
    displayLabel($labels);
    echo"<br><br>";
    $product->displayImage("nutrition");
    displayNutri($nutri);

    displayGrade(grade($bdd, $id_aliment));
    echo " <form action='controller/functions/compare.php' method='POST'>
                <input type='hidden' name='action' value='compare'/>
                <input type='hidden' name='id' value='".$_GET['id']."'/>
                <input class='button_compare' type='submit' value=\"ajouter en comparaison\" />
            </form>";

    displayComments(getComments($bdd,$_GET['id']));

    include("view/afficherFormVoteComment.php");
}
include("model/bot.php");
?>
