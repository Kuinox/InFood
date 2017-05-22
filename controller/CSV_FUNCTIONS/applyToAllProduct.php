<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
include_once("../SQL/FUNCTIONS/updateProduct.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/countLine.php");
function applyToAllProduct($ressource, $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    ob_end_flush();
    $nb_product = countLine();
    $percent = floor($nb_product/10000);
    mysqli_query($bdd, "SET GLOBAL innodb_flush_log_at_trx_commit = 0;");//optimisation
    mysqli_query($bdd, "SET FOREIGN_KEY_CHECKS = 0;");
    mysqli_query($bdd, "SET UNIQUE_CHECKS = 0;");
    $id=0;
    echo "0\n";
    //echo "WHAT\n";
    flush();
    while($id<$nb_product && $id < 1000) { //!feof($ressource)
        if(($id+1)%$percent == 0) {
            echo 100*(round(($id+1)/$nb_product, 3))."\n";
            flush();
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
