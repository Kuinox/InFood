<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/recherche.php");
include("model/functions/displayRecherche.php");
//include ('sql_functions.php');

$id = $_GET['id'];

$result = select ($bdd, "labels", "num", "$id");
if (empty($result)) {
    echo "Lieu de fabrication introuvable !";
} else {
    echo "<h1>".$result['0']['name']."</h1><br>";
    echo $result[0]['products']." aliments possède ce label.";
}

$recherche = recherche($bdd, "aliment_labels");
displayRecherche($recherche);
include("model/bot.php");
?>
