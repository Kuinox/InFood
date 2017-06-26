<?php
include(__DIR__."/../../controller/functions/filtre.php");

function displayAllFilters($bdd) {
    $filters = getUserFilters($bdd, $_SESSION['user']['id_user']);

    foreach($filters as $filter) {
        $decoded = json_decode($filter['json'], true);
        var_dump($decoded);
        var_dump($filter['json']);
        echo "  <div style=''>

                </div>";
    }
}

?>
