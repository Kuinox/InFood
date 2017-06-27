<?php
include('model/top.php');
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/infoAliment.php");
include("controller/SQL/FUNCTIONS/select.php");
include("view/functions/displayCompare.php");
var_dump($_SESSION['compare']);
echo "<div class='comparaison>'";
echo "<table>";
echo "<table class='nutri2'>
        <th>Nutriments</th>";
$nutri = [];
$nb = count($_SESSION['compare']);
for ($i = 0 ;$i < $nb; $i++) {
    $result = select ($bdd, "aliment", "id_aliment",$_SESSION['compare'][$i]);
    echo "<th>Quantité dans ".$result[0]['name_aliment']."</th>";
}
foreach ($_SESSION['compare'] as $key => $value) {
        $nutri[] = nutriments($bdd, $value);
}
foreach ($nutri[0] as $key0 => $val) {
     echo "<tr><td>".$val['label']."</td>";
        foreach($nutri as $clee => $valeur) {
            if (!isset($valeur[$key0]['nutriment_quantity'])) {
                $valeur[$key0]['nutriment_quantity'] = "";
            }
            echo "<td>".$valeur[$key0]['nutriment_quantity']."</td>";
    }
    echo "</tr>";
}
// $nutri = nutriments($bdd, $value);
// $additives = additives($bdd, $value);
// $brand = brand($bdd,$value);
// $packaging = packaging($bdd,$value);
// $place = manufact_place($bdd,$value);
// $allergen = allergen($bdd,$value);
// $labels = label($bdd, $value);
// displayLabelImage($labels);
// displayAllergen($allergen);
// displayPlace($place);
// displayPackaging($packaging);
// displayBrand($brand);
// displayAdditives($additives);
// displayLabel($labels);
// displayNutri($nutri);
// displayGrade(grade($bdd, $value));

echo "</table>";
echo"</div>";

include('model/bot.php');
 ?>
