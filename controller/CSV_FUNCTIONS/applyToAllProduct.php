<?php

include_once("../SQL/FUNCTIONS/injectProduct.php");
include_once("../SQL/FUNCTIONS/updateProduct.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/countLine.php");
include_once(__DIR__."/../../model/jsons/json_parse.php");
function sendValues($keys, $data) {
    $output = [];
    $keys = array_keys($keys);
    foreach($keys as $value) {
        $output[$value] = null;
    }

    foreach($data as $key=>$value) {
        $output[$key] = $value;
    }
    return $output;
}

function getJSONKeys($json_data) {
    $keys = [];
    foreach($json_data as $data) {
        foreach($data as $key=>$value) {
            $keys[$key] = "?";
        }
    }
    return $keys;
}
function applyToAllProduct($ressource, PDO $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    $nb_product = countLine();
    $percent = floor($nb_product/10000);
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 0;") or die ("Erreur BDD");//optimisation
    $bdd->query("SET FOREIGN_KEY_CHECKS = 0;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 0;") or die ("Erreur BDD");
    flush();
    $id=0;
    //echo "0\n";
    $jsons_array = [];
    $json_keys = [];
    flush();
    foreach(array("additives", "allergens", "brands", "categories", "ingredients", "labels", "packaging", "traces") as $json_name) {
        $jsons_array[$json_name] = dataJSON($json_name);
        $json_keys[$json_name] = getJSONKeys($jsons_array[$json_name]);
    }
    include("../SQL/FUNCTIONS/prep_inject.php");


    foreach(array("additives", "allergens", "brands", "categories", "ingredients", "labels", "packaging", "traces") as $json_name) {
        foreach($jsons_array[$json_name] as $value) {
            $debug= array_values(sendValues($json_keys[$json_name], $value));
            $prep["init_$json_name"]->execute($debug);
        }
    }


    $bdd->beginTransaction();
    while($id-1<$nb_product) { //!feof($ressource)
        if(($id+1)%$percent == 0) {
            $percentage = 100*(round(($id+1)/$nb_product, 3));
            $bdd->query("UPDATE bdd_status SET progress=$percentage");
            $bdd->commit();
            echo $percentage."\n";
            flush();
            $bdd->beginTransaction();
        }
        $id++;
        try {
            $product = getProduct($ressource, $columns);
        } catch (ErrorException $e) {
            break;
        }
        try {
            $code($bdd, $product, $prep);//injection magique
        } catch (PDOException $e) {
            echo "<pre>";
            print_r($product);
            echo "</pre>";
            var_dump($e);
            flush();
        }
    }
    $bdd->commit();
    $bdd->query("UPDATE bdd_status SET updating=false");
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 1;") or die ("Erreur BDD");
    $bdd->query("SET FOREIGN_KEY_CHECKS = 1;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 1;") or die ("Erreur BDD");
}
 ?>
