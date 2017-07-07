<?php
include("model/functions/getNbResult.php");
function pageDisplay($bdd, $nb_result) {
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
    if(isset($_GET['type'])) {
        $type = "?type=".$_GET['type'];
        $type_input = "<input type='hidden' name='type' value='".$_GET['type']."' />";
    } else {
        $type = "";
        $type_input = "";
    }
    if(isset($_GET['id'])) {
        $id = "&id=".$_GET['id'];
        $id_input = "<input type='hidden' name='id' value='".$_GET['id']."' />";
    } else {
        $id = "";
        $id_input = "";
    }
    if(isset($_GET['recherche'])) {
        $recherche = "&recherche=".$_GET['recherche'];
        $recherche_input = "<input type='hidden' name='recherche' value='".$_GET['recherche']."' />";
    } else {
        $recherche = "";
        $recherche_input = "";
    }
    $href = $type.$id.$recherche;
    $prec = false;
    $suiv = false;
    if ($debut>0) {
        $prec = true;
    }
    if ($nb_result-$debut>$nb_per_page) {
        $suiv = true;
    }
    if ($nb_result>$nb_per_page) {
        echo "<div class='result_navigation'>";
        if($prec) {
            echo "<a href='".$href."&debut=".($debut-$nb_per_page)."'>Précédent</a>";
        } else {
            echo "<a></a>";
        }
        echo "</br>";
        echo "<form action='' method='GET'>
                $recherche_input
                $id_input
                $type_input
                <select name='debut' onchange='this.form.submit()'>";
        $actual = "";
        for($i=0; $i<ceil($nb_result/$nb_per_page);$i++) {

            if ($nb_per_page*$i == $debut) {
                $actual = "selected";
            }
            echo "<option value='".($nb_per_page*$i)."' $actual>".($i+1)."</option>";
            $actual = "";
        }
        echo "  </select>
                <input type='number' min='0' max='500' value='$nb_per_page' name='result_per_page' onchange='this.form.submit()'> résultats par page.
                </form>";
        if($suiv) {
            echo "<a href='".$href."&debut=".($debut+$nb_per_page)."'>Suivant</a>";
        } else {
            echo "<a></a>";
        }
        echo "</div>";
    }


}
?>
