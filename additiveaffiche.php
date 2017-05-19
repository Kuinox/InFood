<?php
  include ("../controller/SQL/FUNCTIONS/connect.php");
  include ('../sql_functions.php');
  $table = 'additive';
  $where = 'id_additive';
  $like = '4';

echo "<pre>";
print_r (select ($bdd, $table, $where, $like));
echo "</pre>";

?>
