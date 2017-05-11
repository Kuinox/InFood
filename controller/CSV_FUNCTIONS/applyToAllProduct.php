<?php
include_once("SQL/FUNCTIONS/injectProduct.php");
include_once("SQL/FUNCTIONS/updateProduct.php");
include_once("CSV_FUNCTIONS/getProduct.php");
function applyToAllProduct($ressource, $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    $id = 0;
    while($id<200) { //!feof($ressource)
        if ($id%100 == 0) {
            echo "Progression: $id/200</br>";
        }
        $code($bdd, getProduct($ressource, $columns));
        $id++;
    }
}
 ?>
