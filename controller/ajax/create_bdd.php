<?php

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

$dsn = "host=127.0.0.1; charset=utf8";
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
foreach ($columns as $nutriment) {
	$result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
	$nutriments[$nutriment] = $result;
}

/***********************************************
 * Injection                                   *
 ***********************************************/
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
?>
