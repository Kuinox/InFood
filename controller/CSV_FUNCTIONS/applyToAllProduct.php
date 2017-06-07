<?php
include_once("../SQL/FUNCTIONS/injectProduct.php");
include_once("../SQL/FUNCTIONS/updateProduct.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/countLine.php");
function applyToAllProduct($ressource, PDO $bdd, $columns, $code) {// run a function "code" on all the product of the CSV.
    $nb_product = countLine();
    $percent = floor($nb_product/10000);
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 0;") or die ("Erreur BDD");//optimisation
    $bdd->query("SET FOREIGN_KEY_CHECKS = 0;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 0;") or die ("Erreur BDD");
    flush();
    $id=0;
    //echo "0\n";
    include("../SQL/FUNCTIONS/prep_inject.php");
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
        }
    }
    $bdd->commit();
    $bdd->query("UPDATE bdd_status SET updating=false");
    $bdd->query("SET GLOBAL innodb_flush_log_at_trx_commit = 1;") or die ("Erreur BDD");
    $bdd->query("SET FOREIGN_KEY_CHECKS = 1;") or die ("Erreur BDD");
    $bdd->query("SET UNIQUE_CHECKS = 1;") or die ("Erreur BDD");
}
 ?>
