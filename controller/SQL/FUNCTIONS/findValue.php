<?php
function findValue($result, $value) { // find a value in a array of sql results.
    foreach ($result as $key => $line) {
        foreach ($line as $data) {
            if ($value == $data) {
                return $key;
            }
        }
    }
    return false;
}
 ?>
