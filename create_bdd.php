<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include("csv_functions.php");
include("sql_functions.php");
include("connect.php");
set_time_limit(300);

sqlScriptInject($bdd,'create.sql');
sqlScriptInject($bdd,'insert.sql');
$csv = openCSV();
$columns = getLine($csv);
applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
echo "done";
?>
