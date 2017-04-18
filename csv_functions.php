<?php
function openCSV() { //open CSV
    //http://world.openfoodfacts.org/data/en.openfoodfacts.org.products.csv
    $fic=fopen('D:\Downloads\en.openfoodfacts.org.products.csv', "r");
    return $fic;
}

function getWord($ressource) { //get a word from csv
    $word = "";
    while(true) {
        $char = fgetc($ressource);
        if($char == "\t" || $char == "\n" || feof($ressource)) {
            return [$word,$char];
        }
        $word .= $char;
    }
}
function getLine($ressource) { // get a line from csv
    $line = [];
    while(true) {
        $word_result = getWord($ressource);
        if ($word_result[1] == "\n") {
            return $line;
        }
        $line[] = $word_result[0];
    }
}

function sortNutriment($product) {
    $nutriments = [];
    foreach ($product as $properties=>$value) {
        if (str_replace("_100g", "", $properties) != $properties && !empty($value)) {
            $nutriments[$properties] = $value ;
        }

    }
    return $nutriments;
}

function getProduct($ressource, $columns) { // convert any line to a product with the first line of the csv
    $line = getLine($ressource);
    $product = [];
    foreach ($columns as $key=>$value) {
        $product[$value] = $line[$key];
    }
    return $product;
}

function applyToAllProduct($ressource, $columns, $code) {// run a function "code" on all the product of the CSV.
    //while(!feof($ressource)) {
        $code(getProduct($ressource, $columns));
    //}
}
?>
