<?php
session_start();
/*
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}*/
session_write_close();
set_time_limit(0); //exec time can be long
ob_end_flush();
$dsn = "mysql:host=127.0.0.1; charset=utf8;";
$user = "root";
$password = "";
try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $data = $bdd->query("USE INFOOD;");
    $data = $bdd->query("SELECT * FROM bdd_status");
    if ($data->rowCount() == 0) {
        $result['updating'] = false;
    } else {
        $result = $data->fetchAll(PDO::FETCH_ASSOC)[0];
    }

} catch (PDOException $e) {
    $result['updating'] = false;
}



if($result['updating']) {
    while($result['updating']) {
        $data = $bdd->query("SELECT * FROM bdd_status");
        $result = $data->fetchAll(PDO::FETCH_ASSOC)[0];
        echo $result['progress']."\n";
        flush();
        sleep(1);
        //TODO
    }

} else {
    /***********************************************
     * INIT                                        *
     ***********************************************/
    /***********************************************
     *Drop then create the DB.                     *
     ***********************************************/
    include_once("../CSV_FUNCTIONS/applyToAllProduct.php");
    include_once("../SQL/FUNCTIONS/sqlScriptInject.php");
    include_once("../SQL/FUNCTIONS/callThenReturn.php");
    include_once("../CSV_FUNCTIONS/openCSV.php");
    include_once("../CSV_FUNCTIONS/getProduct.php");
    include_once("../CSV_FUNCTIONS/sortNutriment.php");

    foreach (scandir('../SQL/INIT') as $script) {
        if($script != '.' && $script != '..') {
            sqlScriptInject($bdd, "../SQL/INIT/".$script);
        }
    }
    $csv = openCSV();
    $columns = explode("\t",fgets($csv, 116528));
    $nutriments = [];
    $product = getProduct($csv, $columns);
    $sorted = sortNutriment($product);
    foreach ($sorted as $nutriment) {
        $result = callThenReturn($bdd, "CALL insert_nutriment('$nutriment', @output)");
        $nutriments[$nutriment] = $result;
    }
    /***********************************************
     * Injection                                   *
     ***********************************************/
    applyToAllProduct($csv, $bdd, $columns, 'injectProduct');
}
?>
