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

    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
    foreach ($output as $key => $value) {
        $id = array_shift($value);
        $name = array_shift($value);
        if ($type==="manufacturing_place") {
            $type="lieudefabrication";
        }
        echo "<a href=$path$type?id=$id>$name</a><br>";
    }
}
 ?>
