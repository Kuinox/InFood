<?php
/***********************************************
 *Drop then create the DB.                     *
 ***********************************************/
include("csv_functions.php");
include("sql_functions.php");
include("connect.php");


sqlScriptInject($bdd,'create.sql');
sqlScriptInject($bdd,'insert.sql');
$csv = openCSV();
$columns = getLine($csv);
var_dump(getProduct($csv, $columns));
sortNutriment(getProduct($csv), $columns);
echo "done";

applyToAllProduct($csv, $columns, 'insertProduct');
?>
