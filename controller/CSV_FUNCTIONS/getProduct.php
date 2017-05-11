<?php
include_once("CSV_FUNCTIONS/getLine.php");
function getProduct($ressource, $columns) { // convert any line to a product with the first line of the csv
    $line = getLine($ressource); // fgets fail because it need to load the whole file.
    $product = [];
    foreach ($columns as $key=>$value) {
        $product[$value] = $line[$key];
    }
    return $product;
}
 ?>
