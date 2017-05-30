<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
/***********************************************
 * INIT                                        *
 ***********************************************/
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include_once("../CSV_FUNCTIONS/applyToAllProduct.php");
include_once("../SQL/FUNCTIONS/sqlScriptInject.php");
include_once("../SQL/FUNCTIONS/callThenReturn.php");
include_once("../CSV_FUNCTIONS/openCSV.php");
include_once("../CSV_FUNCTIONS/getProduct.php");
include_once("../CSV_FUNCTIONS/sortNutriment.php");
$dsn = "mysql:host=127.0.0.1; charset=utf8;";
$user = "root";
$password = "";
try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
set_time_limit(0); //exec time can be long
foreach (scandir('../SQL/INIT') as $script) {
    if($script != '.' && $script != '..') {
        sqlScriptInject($bdd, "../SQL/INIT/".$script);
    }
}
$csv = openCSV();
$columns = explode("\t",fgets($csv, 116528));
$nutriments = [];
$product = getProduct($csv, $columns);
foreach (sortNutriment($product) as $nutriment) {
    $result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
    $nutriments[$nutriment] = $result;
}

/***********************************************
 * Injection                                   *
 ***********************************************/
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
?>
