<?php
function rechercheToPattern($column) {
    $recherche = addslashes($_GET['recherche']);
    $array = explode (" ",$recherche);
    $output = "";
    $first = false;
    foreach ($array as $key => $value) {
        if(!$first) {
            $first = true;
        } else {
            $output .= " OR ";
        }
        $output .= "$column LIKE '$value"."%'";
        $output .= " OR $column LIKE";
        $output .= "'% ".$value."%'";
    }
    return $output;
}
 ?>
