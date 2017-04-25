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

//insert values if $value is not in table, $additional_value are added after the value
//if primary_key is not filled, it will send NULL(it will use the AUTO_INCREMENT of the table)
function insertIfNotExist($bdd, $table, $value, $additional_value = NULL, $primary_key = 'NULL') {
    if (empty($value)) {
        return false;
    }

    $additional ="";
    if (count($additional_value)>0) {

        $additional = addslashes(",".implode(",", $additional_value));
    }

    $value = addslashes($value);
    $query = "  INSERT INTO $table
                VALUES($primary_key, '$value'$additional)
                ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(ID);";

    @mysqli_query($bdd, $query) or die(var_dump($bdd).$query);

    $id = mysqli_insert_id($bdd);
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
