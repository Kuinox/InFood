<?php
function getNbResult($bdd) {
    $query = "SELECT FOUND_ROWS();";
    return $bdd->query($query)->fetch(PDO::FETCH_COLUMN);
}
?>
