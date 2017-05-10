<?php
function codeToURL($code) {//TODO: Fix small barcode
    return "static.openfoodfacts.org/images/products/".substr($code,0,3)."/".substr($code,3,3)."/".substr($code,6,3)."/".substr($code,9);
}
 ?>
