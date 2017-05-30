<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
function updateProduct(PDO $bdd, $product) {//check if product is update, else call injectProduct
    include("../SQL/QUERY/SELECT_last_modification_aliment.php");
    $result = $bdd->query($query);
    $product_found = $result->rowCount();
    if ($product_found > 1) {
        throw new Exception("SELECT_last_modification_aliment returned multiple result, expected one."."</br>");
    }
    if ($product_found == 0) {
        injectProduct($bdd, $product, false);
    } else if ($result->fetch(PDO::FETCH_NUM)[0] != $product['last_modified_t']) {
        injectProduct($bdd, $product, true);
    }
}
?>
