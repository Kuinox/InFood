<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
	</head>
	<body>

<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
header( 'content-type: text/html; charset=utf-8' );
include("csv_functions.php");
include("sql_functions.php");
$bdd = @mysqli_connect('localhost','root','') or die("Erreur d'accès à la BDD.");
mysqli_set_charset($bdd, "utf8") or die("Erreur chargement charset utf8");

set_time_limit(3000);


foreach (scandir('BDD_SQL_INIT') as $script) {
    if($script != '.' && $script != '..') {
        sqlScriptInject($bdd, "BDD_SQL_INIT/".$script);
    }
}
//sqlScriptInject($bdd,'create.sql');
//sqlScriptInject($bdd,'insert.sql');
$csv = openCSV();
$columns = getLine($csv);
$nutriments = [];
foreach ($columns as $nutriment) {
	if(str_replace("_100g", "", $nutriment) != $nutriment) {
		$result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
		$nutriments[$nutriment] = $result;
	}
}
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
    </body>
</html>
