<?php
function displayName($result)
{
  echo '<div class="name">';
  foreach ($result as $key => $value) {
    echo $value['name_aliment'];
    }
  echo "</div>";
}
function displayNutri($nutri)
{
  echo '<div class="nutriment">';
  echo "<table>";
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
  foreach ($additives as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}
function displayBrand($brand)
{
  echo '<div class="brand">';
  echo "marque : ";
  foreach ($brand as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}
function displayPackaging($packaging)
{
  echo '<div class="packaging">';
  echo "packaging : ";
  foreach ($packaging as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}
function displayPlace($place)
{
  echo '<div class="place">';
  echo "manufacturing_place : ";
  foreach ($place as $key => $value) {
      echo $value['label']. " ";
    }
  echo "</div>";
}


 ?>
