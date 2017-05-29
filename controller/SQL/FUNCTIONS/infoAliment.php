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
  $query = "SELECT d.label FROM aliment a JOIN aliment_has_additive ad ON a.id_aliment = ad.aliment_id_aliment JOIN additive d ON d.id = ad.additive_id_additive WHERE a.id_aliment = ? ";
  $prep = $bdd->prepare($query);
  $prep->execute(array($id_aliment)) or die("Failure");
  return $prep->fetchAll(PDO::FETCH_ASSOC);
}
function displayBrand ($brand)
{
  
}





 ?>
