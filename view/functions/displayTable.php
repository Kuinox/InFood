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
  echo "<table>";
  var_dump($nutri);
  if (empty($nutri)) {
    echo "Champs non renseigné";
  }
  foreach ($nutri as $key => $value) {
    echo "<td>".$value['label']."</td><td>".$value['nutriment_quantity']."</td><tr>";
    }
  echo "</table>";
  echo "</div>";
}
function displayAdditives($additives)
{
  echo '<div class="additives">';
  echo "additif : ";
  if (empty($additives)) {
    echo "Champs non renseigné";
  }
  foreach ($additives as $key => $value) {
      echo $value['label']. " ";
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
  foreach ($brand as $key => $value) {
      echo $value['label']. " ";
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
  foreach ($packaging as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}
function displayPlace($place)
{
  echo '<div class="place">';
  echo "manufacturing_place : ";
  if (empty($place)) {
    echo "Champs non renseigné";
  }
  foreach ($place as $key => $value) {
      echo $value['label']. " ";
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
  foreach ($allergen as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}


 ?>