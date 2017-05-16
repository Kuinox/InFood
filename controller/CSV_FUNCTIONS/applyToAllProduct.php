<?php
include_once("SQL/FUNCTIONS/injectProduct.php");
include_once("SQL/FUNCTIONS/updateProduct.php");
include_once("CSV_FUNCTIONS/getProduct.php");
function applyToAllProduct($ressource, $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    $id = 0;
    $temps = microtime(true);
    mysqli_query($bdd, "SET GLOBAL innodb_flush_log_at_trx_commit = 0;");
    mysqli_query($bdd, "SET FOREIGN_KEY_CHECKS = 0;");
    mysqli_query($bdd, "SET UNIQUE_CHECKS = 0;");


    while($id<10000) { //!feof($ressource)
        /*if ($id%100 == 0) {
            echo "Progression: $id/200</br>";
        }*/


        //echo microtime().",";
        mysqli_begin_transaction($bdd, MYSQLI_TRANS_START_READ_WRITE);
        $code($bdd, getProduct($ressource, $columns));
        mysqli_commit($bdd);
        $id++;
        //echo microtime().";";

    }
    mysqli_query($bdd, "SET GLOBAL innodb_flush_log_at_trx_commit = 1;");
    mysqli_query($bdd, "SET FOREIGN_KEY_CHECKS = 1;");
    mysqli_query($bdd, "SET UNIQUE_CHECKS = 1;");
    $temps2 = microtime(true);
    $calcul = $temps2-$temps;
    echo "temps d'éxec: ".$calcul;
}
 ?>
