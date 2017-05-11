<?php
function openCSV() { //open CSV
    //http://world.openfoodfacts.org/data/en.openfoodfacts.org.products.csv
    $path =  file_get_contents('../../chemin_csv.txt');
    $fic=fopen($path, "r");
    return $fic;
}
 ?>
