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
mysqli_query($bdd, 'DROP DATABASE infood');
mysqli_query($bdd, 'CREATE DATABASE infood');

foreach (scandir('BDD_SQL_INIT') as $script) {
    if($script != '.' && $script != '..') {
		echo "BDD_SQL_INIT/".$script."</br>";
        sqlScriptInject($bdd, "BDD_SQL_INIT/".$script);
    }
}
//sqlScriptInject($bdd,'create.sql');
//sqlScriptInject($bdd,'insert.sql');
$csv = openCSV();
$columns = getLine($csv);
foreach ($columns as $nutriment) {
	if(str_replace("_100g", "", $nutriment)) {
		$query = "CALL insert_nutriment($nutriment, @output)";
		mysqli_query($bdd, $query) or die("Erreur injection nutriment".var_dump($bdd).$query);
	}
}

//applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
    </body>
</html>
