<?php
function select($bdd, $table, $where , $like){
  $query = "SELECT * FROM $table WHERE $where LIKE $like";
  $result = mysqli_query($bdd, $query) or die ("Tes mort ");//TODO imagine l'erreur arrive au forum PI ?
  $fetch = mysqli_fetch_assoc($result);
  return $fetch;
}
 ?>
