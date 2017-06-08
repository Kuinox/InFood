<?php
include("rechercheToPattern.php");
function recherche(PDO $bdd, $entry="") {
    if (empty($entry) && !isset($_GET['type'])) {
        throw new ErrorException("recherche called with no type");
    }
    if (isset($_GET['type'])) {
        $type = addslashes($_GET['type']);
    }
    if (!empty($entry)) {
        $type = $entry;
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
            $query = "SELECT a.id_aliment , a.name_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE ".rechercheToPattern("a.name_aliment")."  OR ".rechercheToPattern("g.label")."
                      ORDER BY a.name_aliment ASC;";
            break;
        case 'additive':
            $query = "SELECT id, label
                      FROM $type
                      WHERE label LIKE '%".$_GET['recherche']."%'
                      ORDER BY label ASC";

            break;
        case 'ingredient':
        case 'brand':
        case 'manufacturing_place':
        case 'allergen':
        case 'categorie':
        case 'packaging':
        case 'generic_name':

            $query = "SELECT id, label
                      FROM $type
                      WHERE ".rechercheToPattern("label")."
                      ORDER BY label ASC";
            break;
        case 'aliment_additive':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_additive aa
                        ON a.id_aliment = aa.aliment_id_aliment
                        JOIN additive ad
                        ON ad.id = aa.additive_id_additive
                        WHERE ad.id= '".$_GET['id']."'
                        ORDER BY ad.label ASC
            ";
            break;
        case 'aliment_ingredient':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_ingredient ai
                        ON a.id_aliment = ai.aliment_id_aliment
                        JOIN ingredient i
                        ON i.id = ai.ingredient_id_ingredient
                        WHERE i.id= '".$_GET['id']."'
                        ORDER BY i.label ASC
            ";
            break;
        case 'aliment_brand':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_brand ab
                        ON a.id_aliment = ab.aliment_id_aliment
                        JOIN brand b
                        ON b.id = ab.brand_id_brand
                        WHERE b.id= '".$_GET['id']."'
                        ORDER BY b.label ASC
            ";
            break;
        case 'aliment_manufacturing_place':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_manufacturing_place am
                        ON a.id_aliment = am.aliment_id_aliment
                        JOIN manufacturing_place m
                        ON m.id = am.manufacturing_place_id_manufacturing_place
                        WHERE m.id= '".$_GET['id']."'
                        ORDER BY m.label ASC
            ";
            break;
        case 'aliment_allergen':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_allergen al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN allergen l
                        ON l.id = al.allergen_id_allergen
                        WHERE l.id= '".$_GET['id']."'
                        ORDER BY l.label ASC
            ";
            break;
        case 'aliment_categorie':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_categorie ac
                        ON a.id_aliment = ac.aliment_id_aliment
                        JOIN categorie c
                        ON c.id = ac.categorie_id_categorie
                        WHERE c.id= '".$_GET['id']."'
                        ORDER BY c.label ASC
            ";
        break;
        case 'aliment_packaging':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_packaging ap
                        ON a.id_aliment = ap.aliment_id_aliment
                        JOIN packaging p
                        ON p.id = ap.packaging_id_packaging
                        WHERE p.id= '".$_GET['id']."'
                        ORDER BY p.label ASC
            ";
            break;
        case 'aliment_generic_name':
            $query ="   SELECT *
                        FROM aliment
                        WHERE generic_name_id = $input

            ";
            //JOIN generic_name g
            //ON a.generic_name_id = g.id
            //WHERE g.id= $input
            //ORDER BY g.label ASC
            break;
        case 'membres':
            $query = "SELECT pseudo
            FROM user
            WHERE pseudo LIKE '%$input%'";
        break;
        default:
            throw new ErrorException("not rooted ".$type);
        }
    $result = $bdd->query($query) or die("erreur BDD");
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $output;
}
 ?>
