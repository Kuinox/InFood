<?php
include_once("../SQL/FUNCTIONS/callThenReturn.php");
include_once("../CSV_FUNCTIONS/sortNutriment.php");
function injectProduct(PDO $bdd, $product, $prep, $update=false) {//SELECT id INTO id_val FROM nutriment WHERE val = label;
    $grade_id = $product['nutrition_grade_fr'];
    if (empty($grade_id)) {
        $grade_id = null;
    }
    $type = $update ? "update" : "insert";
    if (empty($product['generic_name'])) {
        $product['generic_name'] = 'NULL';
    }
    $prep[$type.'_aliment']->execute(array($product['code'],
                                            $product['product_name'],
                                            $product['last_modified_t'],
                                            $product['ingredients_text'],
                                            $product['generic_name'],
                                            $grade_id,
                                            $product['quantity'],
                                            $product['serving_size']
                                        ));

    var_dump($product);
    foreach (explode(',', $product['additives_tags']) as $key => $value) {
        if(!empty($value)) {
            $prep['additive']->execute(array($product['code'], $value));
        }
    }
    if(!empty($product['brands'])) {
        $prep['brands']->execute(array($product['code'], $product['brands']));
    }
    foreach (explode(',', $product['packaging']) as $packaging) {
        if(!empty($packaging)) {
            $prep['packaging']->execute(array($product['code'], $packaging));
        }
    }

    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if(!empty($place)) {
            $prep['manufacturing_places']->execute(array($product['code'],$place));
        }
    }

    foreach (explode(', ', $product['allergens']) as $allergen) {
        if(!empty($allergen)) {
            $prep['allergens']->execute(array($product['code'], $allergen));
        }
    }

    foreach(explode(",", $product['categories']) as $value) {
        if (!empty($value)) {
            $prep['categories']->execute(array($product['code'], $value));
        }
    }
    $num = 1;
    foreach(sortNutriment($product) as $key => $value) {
        if (!empty($value)) {
            $prep['FK_nutriment']->execute(array($product['code'], $num, $value));
        }
        $num++;
    }
    return true;
}
 ?>
