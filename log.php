<?php
function logo($file,$informations) {
    file_put_contents($file , $informations."\n" , FILE_APPEND);
}
?>
