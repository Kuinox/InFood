<?php

include_once("../controller/SQL/FUNCTIONS/connect.php");

$bdd->query("ALTER TABLE `aliment` ADD FULLTEXT INDEX `ingredients` (`name_aliment`)");
$bdd->query("ALTER TABLE `generic_name` ADD FULLTEXT INDEX `generic_name` (`label`)");
$bdd->query("ALTER TABLE `manufacturing_place` ADD FULLTEXT INDEX `manufacturing_place` (`label`)");

echo "Done";
?>
