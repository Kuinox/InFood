<?php
function recherche(PDO $bdd, $input) {
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
        case 'brand':
        case 'manufacturing_place':
        case 'allergen':
        case 'categorie':
        case 'packaging':
        case 'generic_name':
            $query = "SELECT id, label
                      FROM $type
                      WHERE label LIKE '$input';";
            break;
    }
    $result = $bdd->query($query) or die("erreur BDD");
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $output;
}
 ?>
