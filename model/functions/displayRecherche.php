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
    foreach ($output as $key => $value) {
        $id = array_shift($value);
        $name = array_shift($value);
        if ($type==="manufacturing_place") {
            $type="lieudefabrication";
        }
        echo "<a href=$path$type?id=$id>$name</a><br>";
    }
    $nb_out = count($output);
    if ($debut == 0 && $nb_out == $nb_result_p){
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut.">Suivant</a>";
    } else if ($nb_out < $nb_result_p && $debut != 0) {
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut2.">precedent</a>";
    } else if ($debut != 0 && $nb_out == $nb_result_p) {
        $debut = $debut + $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut.">Suivant</a>";
        $debut2 = $debut2 - $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut2.">precedent</a>";
    }


}

 ?>
