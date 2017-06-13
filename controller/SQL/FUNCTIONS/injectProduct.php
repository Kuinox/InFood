<?php
include_once("../SQL/FUNCTIONS/callThenReturn.php");
include_once("../CSV_FUNCTIONS/sortNutriment.php");
function injectProduct(PDO $bdd, $product, $prep, $update=false) {//SELECT id INTO id_val FROM nutriment WHERE val = label;
    /*echo "<pre>";
    print_r($product);
    echo "</pre>";*/
    $grade_id = $product['nutrition_grade_fr'];
    if (empty($grade_id)) {
        $grade_id = null;
    }
    $type = $update ? "update" : "insert";
    if (empty($product['generic_name'])) {
        $product['generic_name'] = null;
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
    $labels = explode(",", $product['labels_tags']);
    foreach (explode(" ",$product['additives']) as $text) {
        if (!empty($text) && $text !== "[" && $text !== "]" && $text !== "->") {
            $query_al = "SELECT num FROM allergens WHERE id='$text'";
            $result_al = $bdd->query($query_al);
            $query_in = "SELECT num FROM ingredients WHERE id='$text'";
            $result_in = $bdd->query($query_in);
            if($result_al->rowCount() === 1) {
                $result = $result_al->fetchAll(PDO::FETCH_ASSOC);
                if (isset($result[0])) {
                    $prep['allergens']->execute(array($product['code'], $result[0]['num']));
                }

            }
            if($result_in->rowCount() === 1) {
                $result = $result_in->fetchAll(PDO::FETCH_ASSOC);
                if (isset($result[0])) {
                    $prep['ingredients']->execute(array($product['code'], $result[0]['num']));
                }
            }
        }
    }
    foreach(array("additives", "brands", "categories", "labels", "packaging", "traces") as $json_name) { //"ingredients",
        foreach (explode(',', $product[$json_name."_tags"]) as $key => $value) {
            if (!empty($value)) {
                $query = "SELECT num FROM $json_name WHERE id='$value'";
                $result = $bdd->query($query);
                $num = $result->fetchAll(PDO::FETCH_ASSOC);
                if (isset($num[0])) {
                    $prep[$json_name]->execute(array($product['code'], $num[0]['num']));
                }
            }
        }
    }

    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if(!empty($place)) {
            $prep['manufacturing_places']->execute(array($product['code'],$place));
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
