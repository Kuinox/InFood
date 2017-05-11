<?php
include("controller/SQL/FUNCTIONS/connect.php");
include("csv_functions.php");
function getSQLProduct($id) {
    $sql_data = mysql_query("SELECT * FROM aliment WHERE ID=$id");
    if(!$sql_data) {
        return false;
    } else {
        $sql_array = mysql_fetch_array($sql_data);
        return $sql_array[0];
    }
}
$fic = openSCV();
$columns = getLine($fic);
var_dump($columns);
//while(!feof($fic)) {
    $product = getProduct($fic, $columns);
    $sql_product = getSQLProduct($product["code"]);
    if (!$sql_product) {
        echo "Produit non existant";
        var_dump($product);
        $id_aliment = $product["code"];
        $name_aliment = $product["product_name"];
        $last_modification_aliment= $product["last_modified_t"];
        define("REQ_SQL", "INSERT INTO aliment (id_aliment, name_aliment, last_modification_aliment)
        VALUES ($id_aliment,\"$name_aliment\",  FROM_UNIXTIME($last_modification_aliment));");
        echo REQ_SQL;
        $erreur = mysql_query(REQ_SQL);
        var_dump(mysql_error($link));
        //or die("Erreur insertion BDD.");
    } else {
        echo "Produit existant";
    }
//}

fclose($fic) ;


/*while(!feof($fic)) {
    $caractere=fgetc($fic);
    if(!feof($fic)) {
    echo $caractere . "<br />";
    }
}
    fclose($fic) ;
*/
 ?>
