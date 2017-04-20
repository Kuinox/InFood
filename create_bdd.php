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
for ($i=0; $i<1000; $i++) {
    var_dump(getProduct($csv, $columns));
}

echo "done";
applyToAllProduct($csv, $columns, 'insertProduct');

?>
