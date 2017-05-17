<?php
include_once("SQL/FUNCTIONS/callThenReturn.php");
include_once("CSV_FUNCTIONS/sortNutriment.php");
function injectProduct($bdd, $product, $update=false) {//SELECT id INTO id_val FROM nutriment WHERE val = label;
    foreach ($product as $key => $value) {
        $product[$key] = addslashes($value);
    }
    $indexes = [];

        $grade_id = "'".$product['nutrition_grade_fr']."'";
    if ($grade_id == "''") {
        $grade_id = 'NULL';
    }
    if ($update) {
        include("SQL/QUERY/UPDATE_aliment.php");
    } else {
        include("SQL/QUERY/INSERT_aliment.php");
    }
    mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));

    foreach (explode(',', $product['additives_tags']) as $key => $value) {
        if(!empty($value)) {
            $query = "CALL insert_additive(".$product['code'].", '$value')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    if(!empty($product['brands'])) {
        $query = "CALL insert_brand(".$product['code'].", '".$product['brands']."')";
        mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
    }
    foreach (explode(',', $product['packaging']) as $packaging) {
        if(!empty($packaging)) {
            $query = "CALL insert_packaging(".$product['code'].", '$packaging')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if(!empty($place)) {
            //$fk = isset($indexes['manufacturing_places'][$place]) ? end($indexes['manufacturing_places']) : 'NULL';
            $querry = "CALL insert_manufacturing_place(".$product['code'].", '$place', 'NULL')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(', ', $product['allergens']) as $allergen) {
        if(!empty($allergen)) {
            $query = "CALL insert_allergen(".$product['code'].", '$allergen')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach(explode(",", $product['categories']) as $value) {
        if (!empty($value)) {
            $query = "CALL insert_categorie(".$product['code'].", '$value')";
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }
    $num = 1;
    foreach(sortNutriment($product) as $key => $value) {
        if (!empty($value)) {
            include("SQL/QUERY/CALL_insert_FK_aliment_has_nutriment.php");
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
        $num++;
    }
    /*
    foreach(explode(",", $product['states_tags']) as $key => $value) {//TODO: Load pic in database.
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
 ?>
