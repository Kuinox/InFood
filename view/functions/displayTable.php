<?php
function displayName($result)
{
    echo '<h1 class="name">';
    foreach ($result as $key => $value) {
        echo $value['name_aliment'];
        }
    echo "</h1>";
}
function displayNutri($nutri)
{

  echo '<div class="nutriment">';
  echo "<table class = ''>";
  echo "nutriments : ";
  if (empty($nutri)) {
    echo "Champs non renseigné";
  }
  foreach ($nutri as $key => $value) {
    echo "<td>".$value['label']."</td><td>".$value['nutriment_quantity']."</td><tr>";
    }
    foreach ($nutri as $key => $value) {
        echo "<td>".$value['label']."</td><td>".$value['nutriment_quantity']."</td><tr>";
    }
    echo "</table>";
    echo "</div>";
}
function displayAdditives($additives)
{
    include_once(__DIR__."/../../model/jsons/json_parse.php");
    echo '<div class="additives">';
    echo "additifs : ";
    if (empty($additives)) {
        echo "Champs non renseigné";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/additives/?id=";
    foreach ($additives as $key => $value) {
        echo "<a href='".$path.$value['num']."'>".$value['name']. "</a> ";
    }
    echo "</div>";
}
function displayBrand($brand)
{
    echo '<div class="brand">';
    echo "marque : ";
    if (empty($brand)) {
        echo "Champs non renseigné";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/brands/?id=";
    foreach ($brand as $key => $value) {
            echo "<a href='".$path.$value['num']."'>".$value['name']. "</a> ";
        }
    echo "</div>";
}
function displayPackaging($packaging)
{
    echo '<div class="packaging">';
    echo "packaging : ";
    if (empty($packaging)) {
        echo "Champs non renseigné";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/packaging/?id=";
    foreach ($packaging as $key => $value) {
            echo "<a href='".$path.$value['num']."'>".$value['name']. "</a> ";
        }
    echo "</div>";
}
function displayPlace($place)
{
    echo '<div class="place">';
    echo "Lieu de fabrication : ";
    if (empty($place)) {
        echo "Champs non renseigné";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/lieudefabrication/?id=";
    foreach ($place as $key => $value) {
            echo "<a href='".$path.$value['id']."'>".$value['label']. "</a> ";
        }
    echo "</div>";
}
function displayAllergen($allergen)
{
    echo '<div class="allergen">';
    echo "allergene : ";
    if (empty($allergen)) {
        echo "Champs non renseigné";
    }
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/allergen/?id=";
    foreach ($allergen as $key => $value) {
        echo "<a href='".$path.$value['num']."'>".$value['name']. "</a> ";
    }
    echo "</div>";
}


function displayGrade($grade) {
    if ($grade !== null) {
        echo "<img alt='nutri_score: $grade' src='https://static.openfoodfacts.org/images/misc/nutriscore-".strtolower($grade).".svg' />";
    }
}

function displayIngredients($ingredients) // pas censé marché
{
  echo '<div class="ingredients">';
  echo "ingredients : ";
  if (empty($ingredients)) {
    echo "Champs non renseigné";
  }
  foreach ($ingredients as $key => $value) {
      $formatted = "";
      $first = true;
      foreach (str_split($value['ingredients_aliment']) as $values) {
          if($values==="_") {
              if($first) {
                  $first = false;
                  $values = "<u>";
              } else {
                  $first = true;
                  $values = "</u>";
              }
          }
          $formatted .= $values;
      }
      echo $formatted;
    }
  echo "</div>";
}

function displayLabelImage($labels) {
    echo '<div class="labelImage">';
    foreach($labels as $label) {
        echo "<img src='".$label['image']."'/>";
    }
    echo "</div>";
}
function displayLabel($labels) {
    echo '<div class="label">';
    echo "Labels: ";
    if(empty($labels)) {
        echo "Champ non renseigné";
    }
    $output = [];
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/labels/?id=";
    foreach($labels as $label) {
        $output[] = "<a href='".$path.$label['num']."'>".$label['name']."</a>";
    }
    echo implode(", ", $output);
    echo "</div>";
}
function diplaysNote($note)
{
    echo '<div class="note">';
    echo "note moyenne : ";
    if(isset($note) ){
        echo "Ce produit n'a pas encore de note";
    }else{
    echo $note['AVG (note)'];
    }
    echo "</div>";
}
function diplaysNbNote($nbNote)
{
    echo '<div class="nbNote">';
    echo "nombre de notes : ";
    echo $nbNote['count(note)'];
    echo "</div>";
}
 ?>
