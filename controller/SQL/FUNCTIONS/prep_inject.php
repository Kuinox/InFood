<?php
$prep = [];
$prep['insert_aliment'] = $bdd->prepare ("CALL insert_aliment(?,?,?,?,?,?,?,?)");
$prep['update_aliment'] = $bdd->prepare ("CALL insert_aliment(?,?,?,?,?,?,?,?)");
$prep['additive'] = $bdd->prepare("CALL insert_additive( ?, ?)");
$prep['brands'] = $bdd->prepare("CALL insert_brand(?,?)");
$prep['packaging'] = $bdd->prepare("CALL insert_packaging(?,?)");
$prep['manufacturing_places'] = $bdd->prepare("CALL insert_manufacturing_place(?, ?)");
$prep['allergens'] = $bdd->prepare("CALL insert_allergen(?,?)");
$prep['categories'] = $bdd->prepare("CALL insert_categorie(?,?)");
$prep['FK_nutriment'] = $bdd->prepare( "CALL insert_FK_aliment_has_nutriment(?,?,?)");
?>
