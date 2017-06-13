<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");

$id = $_GET['id'];

$result = select ($bdd, "packaging", "num", "$id");
if (empty($result)) {
    echo "Packaging introuvable !";
} else {
  echo "<h1>".$result['0']['name']."</h1><br>";
}

$recherche = recherche($bdd, "aliment_packaging");
displayRecherche($recherche);
include("model/bot.php");
?>
