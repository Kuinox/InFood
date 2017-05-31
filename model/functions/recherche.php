<?php
function recherche(PDO $bdd, $input, $entry="") {
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
            $barcode = $bdd->query("SELECT id_aliment FROM aliment WHERE id_aliment = '".$_GET['recherche']."'");
            if ($barcode->rowCount() == 1) {
                header("Location: ./aliment.php?id=".$_GET['recherche']);
                exit;
            }
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
                      WHERE label LIKE '$input'";
            break;
        case 'aliment_additive':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_additive aa
                        ON a.id_aliment = aa.aliment_id_aliment
                        JOIN additive ad
                        ON ad.id = aa.additive_id_additive
                        WHERE ad.id= '$input'
            ";
            break;
        case 'aliment_ingredient':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_ingredient ai
                        ON a.id_aliment = ai.aliment_id_aliment
                        JOIN ingredient i
                        ON i.id = ai.ingredient_id_ingredient
                        WHERE i.id= '$input'
            ";
            break;
        case 'aliment_brand':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_brand ab
                        ON a.id_aliment = ab.aliment_id_aliment
                        JOIN brand b
                        ON b.id = ab.brand_id_brand
                        WHERE b.id= '$input'
            ";
            break;
        case 'aliment_manufacturing_place':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_manufacturing_place am
                        ON a.id_aliment = am.aliment_id_aliment
                        JOIN manufacturing_place m
                        ON m.id = am.manufacturing_place_id_manufacturing_place
                        WHERE m.id= '$input'
            ";
            break;
        case 'aliment_allergen':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_allergen al
                        ON a.id_aliment = al.aliment_id_aliment
                        JOIN allergen l
                        ON l.id = al.allergen_id_allergen
                        WHERE l.id= '$input'
            ";
            break;
        case 'aliment_categorie':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_categorie ac
                        ON a.id_aliment = ac.aliment_id_aliment
                        JOIN categorie c
                        ON c.id = ac.categorie_id_categorie
                        WHERE c.id= '$input'
            ";
        break;
        case 'aliment_packaging':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_packing ap
                        ON a.id_aliment = ap.aliment_id_aliment
                        JOIN packaging p
                        ON p.id = ap.packaging_id_packaging
                        WHERE p.id= '$input'
            ";
            break;
        case 'aliment_generic_name':
            $query ="   SELECT a.*
                        FROM aliment a
                        JOIN aliment_has_generic_name ag
                        ON a.id_aliment = ag.aliment_id_aliment
                        JOIN generic_name g
                        ON g.id = ag.generic_name_id_generic_name
                        WHERE g.id= '$input'
            ";
            break;
    }
    $result = $bdd->query($query) or die("erreur BDD");
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $output;
}
 ?>
