<?php
function exist($bdd, $table, $value) {
    $query = "SELECT * FROM $table";
    $result= mysqli_query($bdd, $query);
    var_dump($result);
    $select = mysqli_fetch_assoc($result);
    var_dump($select);
    echo $query."</br>";
    $id=false;
    mysqli_free_result($result);
    return $id;
}
function insertIfNotExist($bdd, $table, $value, $additional_value = NULL) {
    $additional ="";
    if (count($additional_value)>0) {
        $additional = ",".implode(",", $additional_value);
    }
    $id = exist($bdd, $table, $value);
    if (!$id) {
        echo "injecting the value</br>";
        $query = "INSERT INTO $table VALUES (NULL, \"".addslashes($value)."\"".$additional.")";
        @mysqli_query($bdd, $query) or die("</br> QUERRY:".$query);
        $id = mysqli_insert_id($bdd);
    }
    if (!$id) {
        echo("INSERT INTO $table VALUES (NULL, '$value'".$additional.")</br>");
    }
    echo "END</br>";
    return $id;
}
function insertArrayInTable($bdd, $table, $array) {
    foreach($array as $value) {
        if(!empty($value)){
            insertIfNotExist($bdd,$table,$value);
        }
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
    echo "injecting a product</br>";
    $nutriments = sortNutriment($product);
    insertArrayInTable($bdd, 'nutriment', array_flip($nutriments)); //put that in a future inject init.
    if (!empty($product['nutrition_grade_fr'])) {
        insertIfNotExist($bdd, 'grade_nutriment', $product['nutrition_grade_fr']);
    }
    if (!empty($product['additives_tags'])) {
        insertArrayInTable($bdd, 'additive', explode(',', $product['additives_tags']));
    }
    if(!empty($product['brands'])) {
        insertIfNotExist($bdd, 'brand', $product['brands']);
    }

    insertIfNotExist($bdd, 'packaging', $product['packaging']);
    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if (!isset($return_id)) {
            $return_id = insertIfNotExist($bdd, 'manufacturing_place', $place);
        } else {
            $return_id = insertIfNotExist($bdd, 'manufacturing_place', $place, $return_id);
        }
    }
    echo mysqli_error($bdd);

    //nutriment_level not in CSV, see if a workaround is possible (determining level based on %?)
}
 ?>
