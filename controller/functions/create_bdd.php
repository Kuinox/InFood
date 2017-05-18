<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include_once("CSV_FUNCTIONS/applyToAllProduct.php");
include_once("SQL/FUNCTIONS/sqlScriptInject.php");
include_once("SQL/FUNCTIONS/callThenReturn.php");
include_once("CSV_FUNCTIONS/openCSV.php");

$bdd = @mysqli_connect('localhost','root','') or die("Erreur d'accès à la BDD.");//custom connect
mysqli_set_charset($bdd, "utf8") or die("Erreur chargement charset utf8");//because infood may not exist
set_time_limit(0);//exec time can be too long
foreach (scandir('SQL/INIT') as $script) {
    if($script != '.' && $script != '..') {
        sqlScriptInject($bdd, "SQL/INIT/".$script);
    }
}
$csv = openCSV();
$columns = explode("\t",fgets($csv, 116528));
$nutriments = [];
foreach ($columns as $nutriment) {
	$result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
	$nutriments[$nutriment] = $result;
}
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');*/
?>
