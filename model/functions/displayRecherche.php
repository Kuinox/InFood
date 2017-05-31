<?php
function displayRecherche(array $output) {
    if(empty($output)) {
        echo "Aucun résultat trouvé";
    }
    $type = addslashes($_GET['type']);
    foreach ($output as $key => $value) {
        $id = array_shift($value);
        $name = array_shift($value);
        echo "<a href= $type.php?id=$id>$name</a><br>";
    }
}
 ?>
