<?php
include_once("CSV_FUNCTIONS/getWord.php");
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
 ?>
