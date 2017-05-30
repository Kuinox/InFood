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
include_once("../CSV_FUNCTIONS/applyToAllProduct.php");
include_once("../SQL/FUNCTIONS/callThenReturn.php");
include_once("../CSV_FUNCTIONS/openCSV.php");
include_once("../SQL/FUNCTIONS/connect.php");
set_time_limit(0);//exec time can be long
$csv = openCSV();
$columns = explode("\t",fgets($csv, 116528));
/***********************************************
 * Injection                                   *
 ***********************************************/
applyToAllProduct($csv, $bdd, $columns, 'updateProduct'); //TODO: delete aliment and foreign keys to recreate it.
?>
