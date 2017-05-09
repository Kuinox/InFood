<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include("csv_functions.php");
include("sql_functions.php");
$bdd = @mysqli_connect('localhost','root','') or die("Erreur d'accès à la BDD.");//custom connect
mysqli_set_charset($bdd, "utf8") or die("Erreur chargement charset utf8");//because infood may not exist

set_time_limit(3000);//exec time can be too long


foreach (scandir('SQL/INIT') as $script) {
    if($script != '.' && $script != '..') {
        sqlScriptInject($bdd, "SQL/INIT/".$script);
    }
}
$csv = openCSV();
$columns = getLine($csv);
$nutriments = [];
foreach ($columns as $nutriment) {
	$result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
	$nutriments[$nutriment] = $result;
}
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
?>
