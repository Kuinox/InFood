<?php
function nutriments(PDO $bdd, $id_aliment)
{
  $query = " SELECT n.label, an.nutriment_quantity FROM aliment a JOIN aliment_has_nutriment an ON a.id_aliment = an.aliment_id_aliment JOIN nutriment n ON n.id = an.nutriment_id_nutriment WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function additives(PDO $bdd, $id_aliment)
{
  $query = "SELECT d.label, d.id FROM aliment a JOIN aliment_has_additive ad ON a.id_aliment = ad.aliment_id_aliment JOIN additive d ON d.id = ad.additive_id_additive WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function brand (PDO $bdd, $id_aliment)
{
  $query = "SELECT b.label, b.id FROM aliment a JOIN aliment_has_brand ab ON a.id_aliment = ab.aliment_id_aliment JOIN  brand b ON b.id = ab.brand_id_brand WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function packaging(PDO $bdd, $id_aliment)
{
  $query = "SELECT p.label, p.id FROM aliment a JOIN aliment_has_packaging ap ON a.id_aliment = ap.aliment_id_aliment JOIN  packaging p ON p.id = ap.packaging_id_packaging WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function manufact_place(PDO $bdd, $id_aliment)
{
  $query = "SELECT m.label, m.id FROM aliment a JOIN aliment_has_manufacturing_place am ON a.id_aliment = am.aliment_id_aliment JOIN  manufacturing_place m ON m.id = am.manufacturing_place_id_manufacturing_place WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function allergen(PDO $bdd, $id_aliment)
{
  $query = "SELECT m.label, m.id FROM aliment a JOIN aliment_has_allergen am ON a.id_aliment = am.aliment_id_aliment JOIN  allergen m ON m.id = am.allergen_id_allergen WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function ingredients(PDO $bdd, $id_aliment)
{
  $query = "SELECT ingredients_aliment FROM aliment WHERE id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
