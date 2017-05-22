<?php
  include("controller/SQL/FUNCTIONS/connect.php");
  include("controller/SQL/FUNCTIONS/select.php");
  //include ('sql_functions.php');
  $table = 'aliment';
  $where = 'id_aliment';
  $like = "'0000000016087'";

echo "<pre>";
print_r (select ($bdd, $table, $where, $like));
echo "</pre>";

?>
