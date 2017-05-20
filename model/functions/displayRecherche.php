<?php
function displayRecherche(array $output) {
    $type = addslashes($_GET['type']);
    foreach ($output as $key => $value) {
        $id = array_shift($value);
        $name = array_shift($value);
        echo "<a href= additive.php?id=$id&type=$type>$name</a><br>";
    }
}
 ?>
