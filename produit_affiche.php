<?php
  include ('connect.php');
  include ('sql_functions.php');
  $table = 'aliment';
  $where = 'id_aliment';
  $like = "'0000000016087'";

echo "<pre>";
print_r (select ($bdd, $table, $where, $like));
echo "</pre>";
echo "ok";

?>
