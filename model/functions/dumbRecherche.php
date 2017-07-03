<?php
include("rechercheToPattern.php");
function dumbRecherche(PDO $bdd, $entry="") {
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
    if (empty($entry) && !isset($_GET['type'])) {
        throw new ErrorException("recherche called with no type");
    }
    if (isset($_GET['type'])) {
        $type = addslashes($_GET['type']);
    }
    if (!empty($entry)) {
        $type = $entry;
    }
    if (!isset($_GET['debut'])) {
        $debut = 0;
    }else {
        $debut = intval($_GET['debut']);
    }
    if(!isset($_GET['result_per_page'])) {
        $nb_affichage_par_page = 10;
    } else {
        $nb_affichage_par_page = $_GET['result_per_page'];
    }
    switch ($type) {
        case 'aliment':
            $query = "SELECT id_aliment FROM aliment WHERE id_aliment = ?" ;
            $barcode = $bdd->prepare($query);
            $barcode->execute(array($_GET['recherche']));
            if ($barcode->rowCount() == 1) {
                header("Location: ./aliment?id=".$_GET['recherche']);
                exit;
            }
            $query = "  SELECT SQL_CALC_FOUND_ROWS a.id_aliment , a.name_aliment
                        FROM aliment a
                        LEFT OUTER JOIN generic_name g
                        ON g.id = a.generic_name_id
                        WHERE ".rechercheToPattern("a.name_aliment")."  OR ".rechercheToPattern("g.label")."
                        ORDER BY a.name_aliment ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'additives':
            $query = "SELECT SQL_CALC_FOUND_ROWS *
                      FROM $type
                      WHERE id LIKE '%".$_GET['recherche']."%'
                      ORDER BY name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'labels':
            $query = "SELECT SQL_CALC_FOUND_ROWS *
                      FROM $type
                      WHERE ".rechercheToPattern("name")."
                      ORDER BY name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'manufacturing_place':
        case 'generic_name':
            $query = "SELECT SQL_CALC_FOUND_ROWS id, label
                      FROM $type
                      WHERE ".rechercheToPattern("label")."
                      ORDER BY label ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;

        case 'ingredients':
        case 'brands':
        case 'allergens':
        case 'categories':
        case 'packaging':
        case 'traces':
            $query = "SELECT SQL_CALC_FOUND_ROWS *
                      FROM $type
                      WHERE ".rechercheToPattern("name")."
                      ORDER BY name ASC
                      LIMIT $debut , $nb_affichage_par_page";
            break;
        case 'membres':
            $query = "SELECT pseudo
            FROM user
            WHERE pseudo LIKE '%".$_GET['recherche']."%'";
        break;
        default:
            throw new ErrorException("not rooted ".$type);
        }
    $result = $bdd->query($query);
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $output;
}
 ?>
