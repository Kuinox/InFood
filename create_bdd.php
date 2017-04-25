<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
header( 'content-type: text/html; charset=utf-8' );
include("csv_functions.php");
include("sql_functions.php");
include("connect.php");


set_time_limit(3000);

sqlScriptInject($bdd,'create.sql');
sqlScriptInject($bdd,'insert.sql');

$csv = openCSV();
$columns = getLine($csv);
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
