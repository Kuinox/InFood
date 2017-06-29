<?php
include("../../model/functions/recherche.php");
include("../SQL/functions/connect.php");
$result = recherche($bdd);
echo json_encode($result);
?>
