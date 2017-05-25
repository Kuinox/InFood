<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
include_once("../SQL/FUNCTIONS/updateProduct.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/countLine.php");
function applyToAllProduct($ressource, $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    ob_end_flush();
    $nb_product = countLine();
    $percent = floor($nb_product/10000);
    $bdd->exec("SET GLOBAL innodb_flush_log_at_trx_commit = 0;") or die ("Erreur BDD");//optimisation
    $bdd->exec("SET FOREIGN_KEY_CHECKS = 0;") or die ("Erreur BDD");
    $bdd->exec("SET UNIQUE_CHECKS = 0;") or die ("Erreur BDD");
    flush();
    $id=0;
    echo "0\n";
    while($id<$nb_product && $id < 1000) { //!feof($ressource)
        if(($id+1)%$percent == 0) {
            echo 100*(round(($id+1)/$nb_product, 3))."\n";
            flush();
        }
        $id++;
        $bdd->beginTransaction();
        $product = getProduct($ressource, $columns);
        $code($bdd, $product);//injection magique
        $bdd->commit();
    }
    $bdd->exec("SET GLOBAL innodb_flush_log_at_trx_commit = 1;") or die ("Erreur BDD");
    $bdd->exec("SET FOREIGN_KEY_CHECKS = 1;") or die ("Erreur BDD");
    $bdd->exec("SET UNIQUE_CHECKS = 1;") or die ("Erreur BDD");
}
 ?>
