<?php

function getProduct($ressource, $columns) { // convert any line to a product with the first line of the csv
    $line = explode("\t",fgets($ressource, 116528));
    $product = [];
    foreach ($columns as $key=>$value) {
        $product[$value] = str_replace("\n", '', $line[$key]); // remove new lines
    }
    return $product;
}
 ?>
