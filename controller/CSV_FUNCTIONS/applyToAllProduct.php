<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
include_once("../SQL/FUNCTIONS/updateProduct.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/countLine.php");
function applyToAllProduct($ressource, PDO $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    echo microtime(true);
    ob_end_flush();
    $nb_product = countLine();
    $percent = floor($nb_product/10000);
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 0;") or die ("Erreur BDD");//optimisation
    $bdd->query("SET FOREIGN_KEY_CHECKS = 0;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 0;") or die ("Erreur BDD");
    flush();
    $id=0;
    echo "0\n";
    include("../SQL/FUNCTIONS/prep_inject.php");
    $bdd->beginTransaction();
    while($id<$nb_product && $id < 10000) { //!feof($ressource)
        if(($id+1)%$percent == 0) {
            $bdd->commit();
            echo 100*(round(($id+1)/$nb_product, 3))."\n";
            flush();
            $bdd->beginTransaction();
        }
        $id++;

        $product = getProduct($ressource, $columns);
        $code($bdd, $product, $prep);//injection magique
    }
    $bdd->commit();
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 1;") or die ("Erreur BDD");
    $bdd->query("SET FOREIGN_KEY_CHECKS = 1;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 1;") or die ("Erreur BDD");
    echo microtime(true);
}
 ?>
