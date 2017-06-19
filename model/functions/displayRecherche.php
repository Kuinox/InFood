<?php
function displayRecherche(array $output) {
    if(empty($output)) {
        echo "Aucun résultat trouvé";
    }
    if(isset($_GET['type'])) {
        $type = addslashes($_GET['type']);
    } else {
        $type="aliment";
    }
    if (!isset($_GET['debut'])) {
        $debut = 0;
    }else {
        $debut = $_GET['debut'];
        $debut2 = $_GET['debut'];
    }
    $nb_result_p = 10;
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
    $nb_out = count($output);
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
    if ($debut == 0 && $nb_out == $nb_result_p){
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut.$id.">Suivant</a>";
    } else if ($nb_out < $nb_result_p && $debut != 0) {
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut2.$id.">precedent</a>";
    } else if ($debut != 0 && $nb_out == $nb_result_p) {
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut.$id.">Suivant</a>";
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type.$recherche."&debut=".$debut2.$id.">precedent</a>";
    }


}

 ?>
