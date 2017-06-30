<?php
include('model/top.php');
include("controller/SQL/FUNCTIONS/connect.php");
include("controller/SQL/FUNCTIONS/infoAliment.php");
include("controller/SQL/FUNCTIONS/select.php");
echo "<div class='comparaison'>";
echo "<table class = 'nutri1'>";
echo "<th>Nutriments</th>";
$nutri = [];
$additives = [];
$grade = [];
$brand = [];
$nb = count($_SESSION['compare']);
for ($i = 0 ;$i < $nb; $i++) {
    $result = select ($bdd, "aliment", "id_aliment",$_SESSION['compare'][$i]);
    echo "<th>".$result[0]['name_aliment']."</th>";
}
foreach ($_SESSION['compare'] as $key => $value) {
        $nutri[] = nutriments($bdd, $value);
        $additives[] = additives($bdd, $value);
        $grade[] = grade($bdd, $value);
        $brand[] = brand($bdd,$value);
}
foreach ($nutri[0] as $key => $val) {
     echo "<tr><td>".$val['label']."</td>";
        foreach($nutri as $clee => $valeur) {
            if (!isset($valeur[$key]['nutriment_quantity'])) {
                $valeur[$key]['nutriment_quantity'] = "non renseigné";
            }
            echo "<td>".$valeur[$key]['nutriment_quantity']."</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<table class= 'nutri3'>";
for ($i = 0 ;$i < $nb; $i++) {
    $result = select ($bdd, "aliment", "id_aliment",$_SESSION['compare'][$i]);
    echo "<th>".$result[0]['name_aliment']."</th>";
}
$nbmax = 0;
    foreach ($additives as $key => $value) {
        $nbmax2 = count($additives[$key]);
        if ($nbmax < $nbmax2){
            $nbmax = $nbmax2;
        }
    }
    for ($i=0; $i < $nbmax ; $i++) {
         echo "<tr>";
        foreach ($additives as $clee => $val) {
            if (!isset($val[$i])) {
                echo "<td> // </td>";
            }else {
                echo "<td>".$val[$i]['name']."</td>";
            }
        }
        echo "</tr>";
    }
    foreach ($brand as $key => $value) {
        foreach ($value as $ky => $val) {
            echo "<td>".$val['name']."</td>";
        }
    }

    echo "</table>";
    echo "<table>";
    for ($i = 0 ;$i < $nb; $i++) {
        $result = select ($bdd, "aliment", "id_aliment",$_SESSION['compare'][$i]);
        echo "<th>".$result[0]['name_aliment']."</th>";
    }
    echo "<tr>";
    foreach ($brand as $key => $value) {

        foreach ($value as $ky => $val) {
            echo "<td>".$val['name']."</td>";
        }
    }
    echo "</table>";
    echo "<table class = 'cgrade'>";
    echo "<tr>";
    foreach ($grade as $key => $value) {
        if ($grade[$key] !== null) {
            echo "<td><img alt='nutri_score: ".$grade[$key]."' src='https://static.openfoodfacts.org/images/misc/nutriscore-".strtolower($grade[$key]).".svg' /></td>";
        }
    }
    echo "</tr>";
    echo "</table>";
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
