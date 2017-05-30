<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
set_time_limit(0);//exec time can be long
include_once("../SQL/FUNCTIONS/connect.php");
$data = $bdd->query("SELECT * FROM bdd_status");
$result = $data->fetchAll(PDO::FETCH_ASSOC)[0];

if($result['updating']) {
    while($result['updating']) {
        $data = $bdd->query("SELECT * FROM bdd_status");
        $result = $data->fetchAll(PDO::FETCH_ASSOC)[0];
        echo $result['progress']."\n";
        sleep(1);
        //TODO
    }

} else {
    /***********************************************
     * INIT                                        *
     ***********************************************/
    include_once("../CSV_FUNCTIONS/applyToAllProduct.php");
    include_once("../SQL/FUNCTIONS/callThenReturn.php");
    include_once("../CSV_FUNCTIONS/openCSV.php");
    $csv = openCSV();
    $columns = explode("\t",fgets($csv, 116528));
    /***********************************************
     * Injection                                   *
     ***********************************************/
    applyToAllProduct($csv, $bdd, $columns, 'updateProduct'); //TODO: delete aliment and foreign keys to recreate it.
}
?>
