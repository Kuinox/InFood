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
        if (empty($name)) {
            $name = "  ";
        }
        echo "  <div onclick='filterClicked(this)'  style='border-color: $color;'
                        id = '$id'>
                    $name
                </div>";
    }
    echo "<div><form action='' method='POST'>
            <input type='submit' value='+' />
            <input type='hidden' name='action' value='addFilter' />
    </form></div>";
    echo "</div>";
}

?>
