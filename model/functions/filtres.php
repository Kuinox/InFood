<?php
include(__DIR__."/../../controller/functions/filtre.php");

function displayAllFilters($bdd) {
    $filters = getUserFilters($bdd, $_SESSION['user']['id_user']);
    echo "<div class='filter_container'>";
    foreach($filters as $filter) {
        $decoded = json_decode($filter['json'], true);
        $name = $decoded['name'];
        $color = $filter['color'];
        $id = $filter['id'];
        echo "  <div onclick='filterClicked(this)' class='filter-button'  style='
                            border-color: $color;
                            border-radius: 25px;
                            border-style: solid;
                            border-width: 2px;
                            align-self: flex-start;
                            padding-left:1%;
                            padding-right: 1%;
                            margin-right: 1%;
                            margin-top:0.5%;
                            cursor: pointer;
                            min-width: 2%'
                        id = '$id'>
                    $name
                </div>";
    }
    echo "</div>";
}

?>
