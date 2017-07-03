<?php
include("model/functions/pageDisplay.php");
function displayRecherche(array $output, $bdd) {
    $nb_result = getNbResult($bdd);
    if(empty($output)) {
        echo "Aucun résultats trouvé";
    } else {
        echo "$nb_result résultats trouvé";
    }
    if(isset($_GET['type'])) {
        $type = addslashes($_GET['type']);
    } else {
        $type="aliment";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
    if ($type==="manufacturing_place") {
        $type="lieudefabrication";
    }
    foreach ($output as $key => $value) {
        if ($type=== "aliment" || $type == "generic_name" || $type == "lieudefabrication") {
            $id = array_shift($value);
            $name = array_shift($value);
        } else {
            $id = $value['num'];
            $name = $value['name'];
        }
        echo "<a href=$path$type?id=$id>$name</a><br>";
    }

    if (isset($_GET['recherche'])) {
        $recherche = "&recherche=".$_GET['recherche'];
    } else {
        $recherche = "";
    }
    if (isset($_GET['id'])) {
        $id = "&id=".$_GET['id'];
    } else {
        $id = "";
    }
    pageDisplay($bdd, $nb_result);
}

 ?>
