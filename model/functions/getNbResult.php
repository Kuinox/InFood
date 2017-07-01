<?php
function getNbResult($bdd) {
    $query = "SELECT FOUND_ROWS();";
    $prep = $bdd->query($query);
    $result = $prep->fetch(PDO::FETCH_COLUMN);
    var_dump($result);
    return $result;
}
?>
