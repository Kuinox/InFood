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
  $query = "SELECT * FROM $table WHERE $where LIKE $like";
  $result = mysqli_query($bdd, $query) or die ("Tes mort ");
  $fetch = mysqli_fetch_assoc($result);
  return $fetch;
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


function Error404Checker($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);
    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    if($httpCode == 404) {
        return true;
    }
    return false;
}

function codeToURL($code) {//TODO: Fix small barcode
    return "static.openfoodfacts.org/images/products/".substr($code,0,3)."/".substr($code,3,3)."/".substr($code,6,3)."/".substr($code,9);
}


function callThenReturn($bdd, $query) {
    if (empty($query)) {
        throw new Error('Query is empty in callThenReturn');
    }
    mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
    $result = mysqli_query($bdd, 'SELECT @output');
    $output = mysqli_fetch_all($result);
    if (count($output) != 1) {
        throw new Error('Multiple output on callThenReturn '.$query);
    }
    return reset($output[0]);
}

function updateProduct($bdd, $product) {//check if product is update, else call injectProduct
    include("SQL/QUERY/SELECT_last_modification_aliment.php");
    $result = mysqli_query($bdd, $query);
    $fetch = mysqli_fetch_all($result);
    if (count($fetch) != 1) {
        throw new Error("SELECT_last_modification_aliment returned multiple result, expected one.");
    }
    if ($fetch[0][0] != $product['last_modified_t']) {
        injectProduct($bdd, $product);
    }
}

function injectProduct($bdd, $product) {//SELECT id INTO id_val FROM nutriment WHERE val = label;
    foreach ($product as $key => $value) {
        $product[$key] = addslashes($value);
    }
    $indexes = [];

    $generic_id = 'NULL';
    if(!empty($product['generic_name'])) {
        $generic_id = callThenReturn($bdd,"CALL insert_generic_name('".$product['generic_name']."', @output)");
    }
    $grade_id = "'".$product['nutrition_grade_fr']."'";
    if ($grade_id == "''") {
        $grade_id = 'NULL';
    }
    include("SQL/QUERY/INSERT_aliment.php");
    callThenReturn($bdd, $query);
    foreach (explode(',', $product['additives_tags']) as $key => $value) {
        if(!empty($value)) {
            $num = callThenReturn($bdd, "CALL insert_additive('$value', @output)");
            $query = "CALL insert_FK_aliment_has_additive('".$product['code']."', $num)";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    if(!empty($product['brands'])) {
        $brand_id = callThenReturn($bdd, "CALL insert_brand('".$product['brands']."', @output)");
        $query = "CALL insert_FK_aliment_has_brand('".$product['code']."', $brand_id)";
        mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
    }

    foreach (explode(',', $product['packaging']) as $packaging) {
        if(!empty($packaging)) {
            $packaging_id = callThenReturn($bdd, "CALL insert_packaging('$packaging', @output)");
            $query = "CALL insert_FK_aliment_has_packaging('".$product['code']."', $packaging_id)";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if(!empty($place)) {
            $fk = isset($indexes['manufacturing_places'][$place]) ? end($indexes['manufacturing_places']) : 'NULL';
            $manufacturing_id = callThenReturn($bdd,"CALL insert_manufacturing_place('$place', $fk, @output)");
            $query = "CALL insert_FK_aliment_has_manufacturing_place('".$product['code']."', $manufacturing_id)";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(', ', $product['allergens']) as $allergen) {
        if(!empty($allergen)) {
            $allergen_id = callThenReturn($bdd,"CALL insert_allergen('$allergen', @output)");
            $query = "CALL insert_FK_aliment_has_allergen('".$product['code']."', $allergen_id)";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach(explode(",", $product['categories']) as $value) {
        if (!empty($value)) {
            $categorie_id = callThenReturn($bdd, "CALL insert_categorie('$value', @output)");
            $query = "CALL insert_FK_aliment_has_categorie('".$product['code']."', $categorie_id)";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }
    $num = 1;
    foreach(sortNutriment($product) as $key => $value) {
        if (!empty($value)) {
            $query = "CALL insert_FK_aliment_has_nutriment('".$product['code']."', $num, '$value')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
        $num++;
    }
    /*
    foreach(explode(",", $product['states_tags']) as $key => $value) {
        if ($value == 'en:photos-uploaded') {
            $url = codeToURL($product['code'])."/front_fr.3.400.jpg"; // check all pic names
            echo $url;
            if (!Error404Checker($url)) {
                echo "Found";
            }
            echo "</br>";
        }
    }*/

    return true;
}


function sqlScriptInject($bdd, $script_path) {
    $script_file = fopen($script_path, 'r');
    $script = "";
//var_dump(strstr($script_path, "insert_"));
    if(!strstr($script_path, "insert_")) {
        while ($line = fgets($script_file)) {
            $script[] = $line;
        }
        $lines = "";
        foreach($script as $query) {
            if (is_bool(strpos($query, '--')) && $query != "\n") {
                $lines .= $query;
            }
        }

        foreach(explode(";", $lines) as $query) {
            $query = trim(preg_replace('/\s+/', ' ', $query));
            if (!empty($query) && is_bool(strpos($query, "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0")) && is_bool(strpos($query, "SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS"))) {
                mysqli_query($bdd, $query) or die('Error injecting'.var_dump($bdd)."</br>".$script_path."</br>'".$query."'");
            }
        }
    } else {//procedure
        while ($line = fgets($script_file)) {
            $script .= $line;
        }
        $precedent = '';
        $liste = [];
        foreach (explode("\n", $script) as $value) {
            if($value=="\r") {
                $liste[] = $precedent;
                $precedent = "";
            }
            $precedent.= $value;
        }
        $liste[] = $precedent;
        foreach ($liste as $query) {
            mysqli_query($bdd, $query) or die('Error injecting'.var_dump($bdd)."</br>".$script_path."</br>'".$query."'");
        }
    }
}
 ?>
