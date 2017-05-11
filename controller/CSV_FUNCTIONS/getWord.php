<?php
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
 ?>
