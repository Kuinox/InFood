<?php
include(__DIR__."/functionsRecherche.php");
function recherche(PDO $bdd, $entry = "", $recherche = "") {
    if (empty($recherche) && isset($_GET['recherche'] )) {
        $recherche = $_GET['recherche'];
    }
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
            $query = "SELECT SQL_CALC_FOUND_ROWS id_aliment FROM aliment WHERE id_aliment = ?" ;
            $barcode = $bdd->prepare($query);
            $barcode->execute(array($recherche));
            if ($barcode->rowCount() == 1) {
                header("Location: ./aliment?id=".$recherche);
                exit;
            }
            $result = rechercheAliment($bdd, $recherche, $debut , $nb_affichage_par_page, $type);
            break;

        case 'manufacturing_place':
        case 'generic_name':
            $result = rechercheAlternate($bdd, $recherche, $debut , $nb_affichage_par_page, $type);
            break;
        case 'additives':
        case 'labels':
        case 'ingredients':
        case 'brands':
        case 'allergens':
        case 'categories':
        case 'packaging':
        case 'traces':
            $result = rechercheClassic($bdd, $recherche, $debut , $nb_affichage_par_page, $type);
            break;
        case 'aliment_additives':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_additives aa
                        ON a.id_aliment = aa.aliment_id_aliment
                        JOIN additives ad
                        ON ad.num = aa.additives_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE ad.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY a.name_aliment ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_labels':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_labels al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN labels l
                        ON l.num = al.labels_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE l.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY l.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_ingredients':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_ingredients ai
                        ON a.id_aliment = ai.aliment_id_aliment
                        JOIN ingredients i
                        ON i.num = ai.ingredients_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE i.num= :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY i.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_brands':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_brands ab
                        ON a.id_aliment = ab.aliment_id_aliment
                        JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE b.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY b.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_manufacturing_place':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_manufacturing_place am
                        ON a.id_aliment = am.aliment_id_aliment
                        JOIN manufacturing_place m
                        ON m.id = am.manufacturing_place_id_manufacturing_place
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE m.id= :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY m.label ASC
                        LIMIT $debut , $nb_affichage_par_page";"
            ";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_allergens':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_allergens al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN allergens l
                        ON l.num = al.allergens_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE l.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY l.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_categories':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_categories ac
                        ON a.id_aliment = ac.aliment_id_aliment
                        JOIN categories c
                        ON c.num = ac.categories_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE c.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY c.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_packaging':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_packaging ap
                        ON a.id_aliment = ap.aliment_id_aliment
                        JOIN packaging p
                        ON p.num = ap.packaging_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE p.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY p.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_traces':
            $query ="   SELECT SQL_CALC_FOUND_ROWS a.*, MIN(b.name) as name
                        FROM aliment a
                        JOIN aliment_has_traces at
                        ON a.id_aliment = at.aliment_id_aliment
                        JOIN traces t
                        ON t.num = at.traces_num
                        LEFT OUTER JOIN aliment_has_brands ab
                        ON ab.aliment_id_aliment = id_aliment
                        LEFT OUTER JOIN brands b
                        ON b.num = ab.brands_num
                        WHERE t.num = :id
                        GROUP BY a.id_aliment, ab.aliment_id_aliment
                        HAVING  ab.aliment_id_aliment = MIN(ab.aliment_id_aliment)
                        ORDER BY t.name ASC
                        LIMIT $debut , $nb_affichage_par_page";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'aliment_generic_name':
            $query ="   SELECT SQL_CALC_FOUND_ROWS *
                        FROM aliment
                        WHERE generic_name_id = :id";
            $result = $bdd->prepare($query);
            $result->execute(array(':id' => $_GET['id']));
            break;
        case 'membres':
            $query = "  SELECT pseudo
                        FROM user
                        WHERE pseudo
                        LIKE :recherche";
            $result = $bdd->prepare($query);
            $result->execute(array(':recherche' => "%".$recherche."%"));
        break;
        default:
            throw new ErrorException("not rooted ".$type);
        }
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $output;
}
 ?>
