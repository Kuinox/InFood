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


    foreach ($output as $key => $value) {
        $id = array_shift($value);
        $name = array_shift($value);
        echo "<a href= $type.php?id=$id>$name</a><br>";
    }
}
 ?>
