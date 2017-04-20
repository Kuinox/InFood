<?php
function exist($bdd, $table, $value) {
    $id = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT id_$table FROM $table"));
    return $id;
}
function insertIfNotExist($bdd, $table, $value, $additional_value = NULL) {
    $additional ="";
    if (count($additional_value)>0) {
        $additional = ",".implode(",")
    }
    if (!exist($bdd, $table, $value)) {
        echo "inserted data";
        @mysqli_query($bdd, "INSERT INTO $table VALUES (NULL, '$value'".$additional.")") or die("Error insert");
    }
    $id = mysqli_insert_id($bdd); //if return false, error probably in this function.
    if (!$id) {
        echo "Function insertIfNotExist have probably an error";
    }
    return $id;
}
function insertArrayInTable($bdd, $table, $array) {
    foreach($array as $value) {
        insertIfNotExist($bdd,$table,$value);
    }
}
function sqlScriptInject($bdd, $script_path) {
    $script_file = file($script_path);
    $script = "";
    foreach ($script_file as $line) {
        $script .= $line;
    }
    foreach(explode(";", $script) as $query) {
        mysqli_query($bdd, $query);
    }
}

function injectProduct($bdd, $product) {
    $nutriments = sortNutriment($product);
    insertArray($bdd, 'nutriment', array_flip($nutriments)); //put that in a future inject init.
    insertIfNotExist($bdd, 'grade_nutriment', $product['nutrition_grade_fr']);
    insertArrayInTable($bdd, 'additive', explode(',', $product['additives_tags']));
    insertIfNotExist($bdd, 'brand', $product['brands']);
    insertIfNotExist($bdd, 'packaging', $product['packaging']);
    foreach (explode(',', $product['manufacturing_places'])) {
        insertIf
    }


    //nutriment_level not in CSV, see if a workaround is possible (determining level based on %?)
}
 ?>
