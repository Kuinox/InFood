<?php
function logo($file,$string){
    file_put_contents($file , $string."\n" , FILE_APPEND);
}
?>
