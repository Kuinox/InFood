<?php
function nutriments(PDO $bdd, $id_aliment) {
    $query = " 	SELECT n.label, an.nutriment_quantity
                FROM aliment a
                JOIN aliment_has_nutriment an
                ON a.id_aliment = an.aliment_id_aliment
                JOIN nutriment n
                ON n.id = an.nutriment_id_nutriment
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function additives(PDO $bdd, $id_aliment) {
    $query = "	SELECT d.*
                FROM aliment a
                JOIN aliment_has_additives ad
                ON a.id_aliment = ad.aliment_id_aliment
                JOIN additives d
                ON d.num = ad.additives_num
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function brand (PDO $bdd, $id_aliment) {
    $query = "	SELECT b.*
                FROM aliment a
                JOIN aliment_has_brands ab
                ON a.id_aliment = ab.aliment_id_aliment
                JOIN brands b
                ON b.num = ab.brands_num
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function packaging(PDO $bdd, $id_aliment) {
    $query = "	SELECT p.*
                FROM aliment a
                JOIN aliment_has_packaging ap
                ON a.id_aliment = ap.aliment_id_aliment
                JOIN packaging p
                ON p.num = ap.packaging_num
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function manufact_place(PDO $bdd, $id_aliment) {
    $query = "	SELECT m.*
                FROM aliment a
                JOIN aliment_has_manufacturing_place am
                ON a.id_aliment = am.aliment_id_aliment
                JOIN manufacturing_place m
                ON m.id = am.manufacturing_place_id_manufacturing_place
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function allergen(PDO $bdd, $id_aliment) {
    $query = "	SELECT m.*
                FROM aliment a
                JOIN aliment_has_allergens am
                ON a.id_aliment = am.aliment_id_aliment
                JOIN allergens m
                ON m.num = am.allergens_num
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}

function grade(PDO $bdd, $id_aliment) {
    $query = "	SELECT grade_nutriment
                FROM aliment
                WHERE id_aliment = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC)[0]['grade_nutriment'];
}
function ingredients(PDO $bdd, $id_aliment) {
  $query = "	SELECT ingredients_aliment
                FROM aliment
                WHERE id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment));
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}

function label(PDO $bdd, $id_aliment) {
    $query = "	SELECT m.*
                FROM aliment a
                JOIN aliment_has_labels am
                ON a.id_aliment = am.aliment_id_aliment
                JOIN labels m
                ON m.num = am.labels_num
                WHERE a.id_aliment = ? ";
    $prep = $bdd->prepare($query);
    $prep->execute(array($id_aliment));
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
