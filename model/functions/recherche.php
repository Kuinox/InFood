<?php
include("rechercheToPattern.php");
function recherche(PDO $bdd, $entry="") {
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

    $nb_affichage_par_page = 10;
    switch ($type) {
        case 'aliment':
            $query = "SELECT id_aliment FROM aliment WHERE id_aliment = ?" ;
            $barcode = $bdd->prepare($query);
            $barcode->execute(array($_GET['recherche']));
            if ($barcode->rowCount() == 1) {
                header("Location: ./aliment?id=".$_GET['recherche']);
                exit;
            }
            $query = "SELECT a.id_aliment , a.name_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE ".rechercheToPattern("a.name_aliment")."  OR ".rechercheToPattern("g.label")."
                      ORDER BY a.name_aliment ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'additives':
            $query = "SELECT *
                      FROM $type
                      WHERE id LIKE '%".$_GET['recherche']."%'
                      ORDER BY name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'labels':
            $query = "SELECT *
                      FROM $type
                      WHERE ".rechercheToPattern("name")."
                      ORDER BY name ASC";
            break;
        case 'manufacturing_place':
        case 'generic_name':
            $query = "SELECT id, label
                      FROM $type
                      WHERE ".rechercheToPattern("label")."
                      ORDER BY label ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;

        case 'ingredients':
        case 'brands':
        case 'allergens':
        case 'categories':
        case 'packaging':
            $query = "SELECT *
                      FROM $type
                      WHERE ".rechercheToPattern("name")."
                      ORDER BY name ASC";
            break;
        case 'aliment_additives':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_additives aa
                        ON a.id_aliment = aa.aliment_id_aliment
                        JOIN additives ad
                        ON ad.num = aa.additives_num
                        WHERE ad.num = ".$_GET['id']."
                        ORDER BY a.name_aliment ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_labels':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_labels al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN labels l
                        ON l.num = al.labels_num
                        WHERE l.num = ".$_GET['id']."
                        ORDER BY l.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_ingredients':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_ingredients ai
                        ON a.id_aliment = ai.aliment_id_aliment
                        JOIN ingredient i
                        ON i.num = ai.ingredient_id_ingredient
                        WHERE i.id= ".$_GET['id']."
                        ORDER BY i.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_brands':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_brands ab
                        ON a.id_aliment = ab.aliment_id_aliment
                        JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE b.num = ".$_GET['id']."
                        ORDER BY b.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_manufacturing_place':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_manufacturing_place am
                        ON a.id_aliment = am.aliment_id_aliment
                        JOIN manufacturing_place m
                        ON m.id = am.manufacturing_place_id_manufacturing_place
                        WHERE m.id= '".$_GET['id']."'
                        ORDER BY m.label ASC LIMIT ".$debut.','.$nb_affichage_par_page;"
            ";
            break;
        case 'aliment_allergens':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_allergens al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN allergens l
                        ON l.num = al.allergens_num
                        WHERE l.num = ".$_GET['id']."
                        ORDER BY l.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_categories':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_categories ac
                        ON a.id_aliment = ac.aliment_id_aliment
                        JOIN categories c
                        ON c.num = ac.categories_num
                        WHERE c.num = ".$_GET['id']."
                        ORDER BY c.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_packaging':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_packaging ap
                        ON a.id_aliment = ap.aliment_id_aliment
                        JOIN packaging p
                        ON p.num = ap.packaging_num
                        WHERE p.num = ".$_GET['id']."
                        ORDER BY p.name ASC LIMIT ".$debut.','.$nb_affichage_par_page;
            break;
        case 'aliment_generic_name':
            $query ="   SELECT *
                        FROM aliment
                        WHERE generic_name_id = ".$_GET['id'];
            //JOIN generic_name g
            //ON a.generic_name_id = g.id
            //WHERE g.id= $input
            //ORDER BY g.label ASC
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
