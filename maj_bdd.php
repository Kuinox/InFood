<?php
/****************************************************
 * INIT                                             *
 ****************************************************/
function getWord($ressource) { //get a word from
    $word = "";
    while(true) {
        $char = fgetc($ressource);
        if($char == "\t" || $char == "\n") {
            return [$word,$char];
        }
        $word .= $char;
    }
}
function getLine($ressource) {
    $line = [];
    while(true) {
        $word_result = getWord($ressource);
        if ($word_result[1] == "\n") {
            return $line;
        }
        $line[] = $word_result[0];
    }
}
function getProduct($ressource, $columns) {
    $line = getLine($ressource);
    $product = [];
    foreach ($columns as $key=>$value) {
        $product[$value] = $line[$key];
    }
    return $product;
}
/****************************************************
 * Main                                             *
 ****************************************************/

$fic=fopen('http://world.openfoodfacts.org/data/en.openfoodfacts.org.products.csv', "r");
$columns = getLine($fic);
var_dump(getProduct($fic, $columns));

fclose($fic) ;


/*while(!feof($fic)) {
    $caractere=fgetc($fic);
    if(!feof($fic)) {
    echo $caractere . "<br />";
    }
}
    fclose($fic) ;
*/
 ?>
