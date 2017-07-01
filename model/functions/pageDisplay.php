<?php

function pageDisplay($nb_result) {
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
    var_dump($nb_result, $debut, $nb_per_page);
    if($prec) {
        echo "<a href='".$href."&debut=".($debut-$nb_per_page)."'>Précédent</a>";
    }

    if($suiv) {
        echo "<a href='".$href."&debut=".($debut+$nb_per_page)."'>Suivant</a>";
    }





    /*
    $type = $_GET['type'];
    if (!isset($_GET['debut'])) {
        $debut = 0;
    }else {
        $debut = $_GET['debut'];
        $debut2 = $_GET['debut'];
    }
    $nb_result_p = 10;
    $nb_out = count($output);
    if ($debut == 0 && $nb_out == $nb_result_p){
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut.$id.">Suivant</a>";
    } else if ($nb_out < $nb_result_p && $debut != 0) {
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut2.$id.">precedent</a>";
    } else if ($debut != 0 && $nb_out == $nb_result_p) {
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut.$id.">Suivant</a>";
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut2.$id.">precedent</a>";
    }*/
}
?>
