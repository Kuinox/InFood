<?php
function exist($bdd, $table, $value) {
    $id = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT id_$table FROM $table"));
    var_dump($id);
    return $id;
}
function insertIfNotExist($bdd, $table, $value) {
    if (!exist($bdd, $table, $value)) {
        echo "inserted data";
        @mysqli_query($bdd, "INSERT INTO $table VALUES (NULL, '$value')") or die("Error insert");
    }
    $id = exist($bdd, $table, $value); //if return false, error probably in this function.
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

function injectProduct($bdd, $product) {//refaire
    $nutriments = sortNutriment($product);
    insertArray($bdd, array_flip($nutriments)); //possibly put that in inject init.
    insert
}
 ?>
