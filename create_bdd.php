<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
header( 'content-type: text/html; charset=utf-8' );
include("csv_functions.php");
include("sql_functions.php");
include("connect.php");
function injectProduct($bdd, $product) {
    echo "injecting product: ".$product['code']."</br>";
    $nutriments = sortNutriment($product);
    insertArrayInTable($bdd, 'nutriment', array_flip($nutriments));//put that in a future inject init.
    $grade = insertIfNotExist($bdd, 'grade_nutriment', $product['nutrition_grade_fr']);
    insertArrayInTable($bdd, 'additive', explode(',', $product['additives_tags']));
    insertIfNotExist($bdd, 'brand', $product['brands']);
    foreach (explode(',', $product['packaging']) as $packaging) { //deux fois le meme packaging, le insertIfNotExist fonctionne ?
        insertIfNotExist($bdd, 'packaging', $packaging);
    }
    foreach (explode(',', $product['manufacturing_places']) as $place) { //Ptites erreurs ...  A revoir les données/modéles
        if (!isset($return_id)) {
            $return_id = insertIfNotExist($bdd, 'manufacturing_place', $place, Array('NULL'));
        } else {
            $return_id = insertIfNotExist($bdd, 'manufacturing_place', $place, Array($return_id));
        }
    }
    foreach (explode(', ', $product['allergens']) as $allergen) {
        insertIfNotExist($bdd, 'allergen', $allergen);
    }
    $generic = insertIfNotExist($bdd, 'generic_name', $product['generic_name']);

    $query = "INSERT INTO aliment VALUES (";
    $query .= "'".$product['code']."'";
    $query .= ",'".addslashes($product['product_name'])."'";
    $query .= ",FROM_UNIXTIME(".$product['last_modified_t'].")";
    $query .= ",'".addslashes($product['ingredients_text'])."'";
    if (empty($generic)) {
        $generic = 'NULL';
    }
    $query .= ",".$generic;

    if (empty($grade)) {
        $grade = 'NULL';
    }
    $query .= ",".$grade;
    $query .= ",'".addslashes($product['quantity'])."'";
    $query .= ",'".addslashes($product['serving_size'])."')";
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










set_time_limit(3000);

sqlScriptInject($bdd,'create.sql');
sqlScriptInject($bdd,'insert.sql');
$csv = openCSV();
$columns = getLine($csv);
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
