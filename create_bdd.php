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
include("connect.php");
set_time_limit(3000);
var_dump(scandir('BDD_SQL_INIT'));


foreach (scandir('BDD_SQL_INIT') as $script) {
    if($script == '.' || $script == '..') {

    } else {
        sqlScriptInject($bdd, "BDD_SQL_INIT/".$script);
    }

    //s
}
//sqlScriptInject($bdd,'create.sql');
//sqlScriptInject($bdd,'insert.sql');
//sqlScriptInject($bdd,'');

$csv = openCSV();
$columns = getLine($csv);
$nutriments = sortNutriment($product);
foreach ($nutriments as $nutriment) {
	$query = "CALL insert_nutriment($nutriment)";
    mysqli_query($bdd, $query) or die("Erreur injection nutriment".var_dump($bdd).$query);
}
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
    </body>
</html>
