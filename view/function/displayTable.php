<?php
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
  echo "<table>";

  foreach ($additives as $key => $value) {
    $chaine = implode(";", $value);
      echo $chaine. " ";
    }
  echo "</table>";
  echo "</div>";
}
function displayBrand($brand)
{
  echo '<div class="additives">';
  echo "<table>";
  foreach ($brand as $key => $value) {
    $chaine = implode(";", $value);
      echo $chaine. " ";
    }
  echo "</table>";
  echo "</div>";
}





 ?>
