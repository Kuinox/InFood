<?php
function recherche(mysqli $bdd, string $input) {
    $type = addslashes($_GET['type']);
    switch ($type) {
        case 'aliment':
            $query = "SELECT a.id_aliment , a.name_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE a.name_aliment LIKE '$input' OR g.label LIKE'$input';";

            break;
        case 'additive':
        case 'ingredient':
            $query = "SELECT id, label
                      FROM $type
                      WHERE label LIKE '$input';";
            break;
    }
    $result = mysqli_query($bdd, $query) or die("erreur BDD");
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); ;
    return $output;
}
 ?>
