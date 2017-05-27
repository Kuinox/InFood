<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
function updateProduct($bdd, $product) {//check if product is update, else call injectProduct
    include("../SQL/QUERY/SELECT_last_modification_aliment.php");
    $result = $bdd->query($query);
    if ($result->rowCount != 1) {
        throw new Error("SELECT_last_modification_aliment returned multiple result, expected one.");
    }
    if ($fetch[0][0] != $product['last_modified_t']) {
        injectProduct($bdd, $product, true);
    }
}
?>
