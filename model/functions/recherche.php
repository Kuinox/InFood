<?php
include("controller/SQL/FUNCTIONS/select.php");
function recherche(mysqli $bdd, string $input) {
    $type = addslashes($_GET['type']);
    switch ($type) {
        case 'aliment':
            $query = "SELECT g.label , a.name_aliment, a.id_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE a.name_aliment LIKE '$input';";

            break;
        case 'additive':
        case 'ingredient':
            $query = "SELECT id, label
                      FROM $type
                      WHERE label LIKE '$input';";
            break;
    }
    $result = mysqli_query($bdd, $query);
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); ;
    return $output;
}
 ?>
