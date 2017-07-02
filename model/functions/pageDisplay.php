<?php
include("model/functions/getNbResult.php");
function pageDisplay($bdd) {
    $nb_result = getNbResult($bdd);
    if(!isset($_GET['result_per_page'])) {
        $nb_per_page = 10;
    } else {
        $nb_per_page = $_GET['result_per_page'];
    }
    if(!isset($_GET['debut'])) {
        $debut = 0;
    } else {
        $debut = $_GET['debut'];
    }
    $href = "?type=".$_GET['type']."&recherche=".$_GET['recherche'];
    $prec = false;
    $suiv = false;
    if ($debut>0) {
        $prec = true;
    }
    if ($nb_result-$debut>$nb_per_page) {
        $suiv = true;
    }
    echo "<div class='result_navigation'>";
    if($prec) {
        echo "<a href='".$href."&debut=".($debut-$nb_per_page)."'>Précédent</a>";
    }
    echo "<form action='' method='GET'>
            <input type='hidden' name='type' value='".$_GET['type']."' />
            <input type='hidden' name='recherche' value='".$_GET['recherche']."' />
            <select name='debut'>";
    $actual = "";
    for($i=1; $i<ceil($nb_result/$nb_per_page);$i++) {
        if ($nb_per_page*$i === $debut) {
            $actual = "selected";
        }
        echo "<option value='".($nb_per_page*$i)."' $actual>$i</option>";
        $actual = "";
    }
    echo "  <input type='submit' value='Go' /></select>
            </form>";
    if($suiv) {
        echo "<a href='".$href."&debut=".($debut+$nb_per_page)."'>Suivant</a>";
    }
    echo "</div>";
}
?>
