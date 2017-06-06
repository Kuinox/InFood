<?php
function callThenReturn(PDO $bdd, $query) {
    if (empty($query)) {
        throw new Error('Query is empty in callThenReturn');
    }
    $bdd->query($query);
    $prep = $bdd->query('SELECT @output');
    $output = $prep->fetchAll();
    if (count($output) != 1) {
        throw new Error('Multiple output on callThenReturn '.$query);
    }
    return reset($output[0]);
}
 ?>
