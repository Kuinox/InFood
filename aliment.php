<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include ("controller/TEST.php");

echo "<pre>";
$result = select ($bdd, "aliment", "id_aliment",$_GET['id']);
if (empty($result)) {
    echo "Aliment introuvable !";
} else {
    print_r ($result);
}

echo "</pre>";
displayComents();
include("model/bot.php");
?>
