<?php
  include("controller/SQL/FUNCTIONS/connect.php");
  include("controller/SQL/FUNCTIONS/select.php");
  include("controller/TEST.php");
  //include ('sql_functions.php');

$id = mysqli_escape_string($bdd, $_GET['id']);
echo "<pre>";
print_r (select ($bdd, "categorie", "id_aliment", "'$id'"));
echo "</pre>";
displayComents();
?>
