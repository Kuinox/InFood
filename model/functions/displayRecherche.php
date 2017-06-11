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
    if ($_GET['debut'] == 0){
        $debut = $_GET['debut'] + $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut.">Suivant</a>";
    }else {
        $debut = $_GET['debut'] + $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut.">Suivant</a>";
        $debut2 = $_GET['debut'] - $nb_result_p;
        echo "<a href=?type=".$type."&recherche=".$_GET['recherche']."&debut=".$debut2.">precedent</a>";
    }

}

 ?>
