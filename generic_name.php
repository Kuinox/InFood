<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/connect.php");
include("model/functions/displayRecherche.php");
include("model/functions/recherche.php");
$id = $_GET['id'];

$prep = $bdd->prepare("SELECT label FROM generic_name WHERE id=?");
$prep->execute(array($id));
$result = $prep->fetchAll(PDO::FETCH_ASSOC);
if (empty($result)) {
    echo "Nom génerique introuvable !";
} else {
    echo "<h1>".$result['0']['label']."</h1><br>";
}

$recherche = recherche($bdd, "aliment_generic_name");
displayRecherche($recherche, $bdd);
include("model/bot.php");
?>
