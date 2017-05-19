<?php
function countLine() {
    $i=0;
    $file_path = file_get_contents('../../../chemin_csv.txt');
    $fp =fopen($file_path,'r');
    while ($chunk = fread($fp, 1024000)) {
        $i += substr_count($chunk, "\n");
    }
    return $i;
}


 ?>
