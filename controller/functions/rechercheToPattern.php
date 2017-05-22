<?php
function rechercheToPattern() {
    $recherche = addslashes($_GET['recherche']);
    $array = explode (" ",$recherche);
    $output = "";
    foreach ($array as $key => $value) {
      $output .= "%".$value."%";
    }
    return $output;
}
 ?>
