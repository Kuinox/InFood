<?php
include_once("SQL/FUNCTIONS/callThenReturn.php");
include_once("CSV_FUNCTIONS/sortNutriment.php");
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
            include("SQL/QUERY/CALL_insert_FK_aliment_has_additive.php");
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    if(!empty($product['brands'])) {
        $brand_id = callThenReturn($bdd, "CALL insert_brand('".$product['brands']."', @output)");
        include("SQL/QUERY/CALL_insert_FK_aliment_has_brand.php");
        mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
    }

    foreach (explode(',', $product['packaging']) as $packaging) {
        if(!empty($packaging)) {
            $packaging_id = callThenReturn($bdd, "CALL insert_packaging('$packaging', @output)");
            include("SQL/QUERY/CALL_insert_FK_aliment_has_packaging.php");
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(',', $product['manufacturing_places']) as $place) {
        if(!empty($place)) {
            $fk = isset($indexes['manufacturing_places'][$place]) ? end($indexes['manufacturing_places']) : 'NULL';
            $manufacturing_id = callThenReturn($bdd,"CALL insert_manufacturing_place('$place', $fk, @output)");
            include("SQL/QUERY/CALL_insert_FK_aliment_has_manufacturing_place.php");
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach (explode(', ', $product['allergens']) as $allergen) {
        if(!empty($allergen)) {
            $allergen_id = callThenReturn($bdd,"CALL insert_allergen('$allergen', @output)");
            include("SQL/QUERY/CALL_insert_FK_aliment_has_allergen.php");
            mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
        }
    }

    foreach(explode(",", $product['categories']) as $value) {
        if (!empty($value)) {
            $categorie_id = callThenReturn($bdd, "CALL insert_categorie('$value', @output)");
            include("SQL/QUERY/CALL_insert_FK_aliment_has_categorie.php");
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
