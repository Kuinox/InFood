<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include("csv_functions.php");
include("sql_functions.php");
include("SQL/FUNCTIONS/connect.php");
include("CSV_FUNCTIONS/openCSV.php");

set_time_limit(3000);//exec time can be too long
$csv = openCSV();
$columns = getLine($csv);
applyToAllProduct($csv, $bdd, $columns, 'updateProduct'); //TODO: delete aliment and foreign keys to recreate it.
?>
