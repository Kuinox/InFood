<?php

function selectAll($bdd, $table) { //select a sql table and return a array of sql result
    $result = mysqli_query($bdd, "SELECT * FROM $table");
    $output = [];
    while ($select = mysqli_fetch_assoc($result)) {
        $output [] = $select;
    }
    return $output;
}
function select($bdd, $table, $where , $like){
  $result = mysqli_query($bdd, "SELECT * FROM $table WHERE $where LIKE $like") or die ("Tes mort ");
  $result = mysqli_fetch_assoc($result);
    return $result;
}
function find_value($result, $value) { // find a value in a array of sql results.
    foreach ($result as $key => $line) {
        foreach ($line as $data) {
            if ($value == $data) {
                return $key;
            }
        }
    }
    return false;
}


function insertIfNotExist($bdd, $table, $value, $additional_value = NULL, $primary_key = 'NULL') {
    if (empty($value)) {
        return false;
    }
    $additional ="";
    if (count($additional_value)>0) {

        $additional = ",".implode(",", $additional_value);
    }

    $id = find_value(selectAll($bdd, $table),$value);
    if (!$id) { // if value not found
        $query = "INSERT INTO $table VALUES ($primary_key, \"".addslashes($value)."\"".$additional.")";
        @mysqli_query($bdd, $query) or die(var_dump($bdd).$query);
        $id = mysqli_insert_id($bdd);
    }
    if (!$id) { //if no ID is not returned = insert failed
        throw new Exception('Insert failed and die() didnt trigger.');
    }
    return $id;
}

function insertArrayInTable($bdd, $table, $array) {
    foreach($array as $value) {
        if(!empty($value)){
            insertIfNotExist($bdd,$table,$value);
        }
    }
}
function injectProduct($bdd, $product) {
    echo "injecting product: ".$product['code']."</br>";

    mysqli_query($bdd, $query) or die("Erreur injection produit".var_dump($bdd).$query);
/*
    if (!empty($product['image_url'])) {
        echo '<pre>';
        print_r($product);
        echo '</pre>';
    }
*/
    // refaire "quantity" avec kg/l
    // attribut TODO: ingredient, nutriment_level, images
    //voir images aussi.
    //insertArrayInTable($bdd, 'keywords', explode(',', $product['keywords']));
    //NO KEYWORDS ???
    //nutriment_level not in CSV, see if a workaround is possible (determining level based on %?)
}


function sqlScriptInject($bdd, $script_path) {
    $script_file = file($script_path);
    $script = "";
    foreach ($script_file as $line) {
        $script .= $line;
    }
    foreach(explode(";", $script) as $query) {
        if (!empty($query)) {
            mysqli_query($bdd, $query);
        }
    }
}
 ?>
