<?php
include_once("SQL/FUNCTIONS/injectProduct.php");
include_once("SQL/FUNCTIONS/updateProduct.php");
include_once("CSV_FUNCTIONS/getProduct.php");
include_once("CSV_FUNCTIONS/countLine.php");
function applyToAllProduct($ressource, $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    $nb_product = countLine();
    $percent = floor(/100);
    mysqli_query($bdd, "SET GLOBAL innodb_flush_log_at_trx_commit = 0;");//optimisation
    mysqli_query($bdd, "SET FOREIGN_KEY_CHECKS = 0;");
    mysqli_query($bdd, "SET UNIQUE_CHECKS = 0;");
    $id=0;
    while($id<$nb_product) { //!feof($ressource)
        if($id%$percent == 0) {
            echo floor($nb_product/$percent);
        }
        $id++;
        mysqli_begin_transaction($bdd, MYSQLI_TRANS_START_READ_WRITE);
        $product = getProduct($ressource, $columns);
        $code($bdd, $product);//injection magique
        mysqli_commit($bdd);
    }
    mysqli_query($bdd, "SET GLOBAL innodb_flush_log_at_trx_commit = 1;");
    mysqli_query($bdd, "SET FOREIGN_KEY_CHECKS = 1;");
    mysqli_query($bdd, "SET UNIQUE_CHECKS = 1;");
}
 ?>
