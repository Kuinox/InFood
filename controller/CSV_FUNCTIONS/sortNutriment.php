<?php
function sortNutriment($product) {//sort out the nutriment of the properties
    $nutriments = [];
    foreach ($product as $properties=>$value) {
        if (str_replace("_100g", "", $properties) != $properties) {
            $nutriments[$properties] = $value ;
        }

    }
    return $nutriments;
}
 ?>
