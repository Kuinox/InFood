<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/select.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");

$id = $_GET['id'];

$result = select ($bdd, "traces", "num", "$id");
if (empty($result)) {
    echo "Traces introuvable !";
} else {
  echo "<h1>".$result['0']['name']."</h1><br>";
}

$recherche = recherche($bdd, "aliment_traces");
displayRecherche($recherche, $bdd);
include("model/bot.php");
?>
