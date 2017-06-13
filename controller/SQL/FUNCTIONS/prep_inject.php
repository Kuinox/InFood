<?php
$prep = [];
$prep['insert_aliment'] = $bdd->prepare ("CALL insert_aliment(?,?,?,?,?,?,?,?)");
$prep['update_aliment'] = $bdd->prepare ("CALL update_aliment(?,?,?,?,?,?,?,?)");
$prep['manufacturing_places'] = $bdd->prepare(  "CALL insert_manufacturing_place(?, ?)");
$prep['FK_nutriment'] = $bdd->prepare( "CALL insert_FK_aliment_has_nutriment(?,?,?)");
$prep['allergens'] = $bdd->prepare("INSERT INTO aliment_has_allergens (aliment_id_aliment, allergens_id) VALUES (?, ?)");
foreach(array("additives", "allergens", "brands", "categories", "labels", "packaging", "traces", "ingredients") as $json_name) {
    $json_data = $jsons_array[$json_name];
    $columns_json = $json_keys[$json_name];
    $prep["init_$json_name"] = $bdd->prepare("INSERT INTO $json_name (".implode(",", array_keys($columns_json)).") VALUES (".implode(",", $columns_json).")");
    $prep[$json_name] = $bdd->prepare("INSERT INTO aliment_has_$json_name (aliment_id_aliment, ".$json_name."_num) VALUES (?,?)");
}
?>
