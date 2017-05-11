<?php
function select($bdd, $table, $where , $like){
  $query = "SELECT * FROM $table WHERE $where LIKE $like";
  $result = mysqli_query($bdd, $query) or die ("Tes mort ");
  $fetch = mysqli_fetch_assoc($result);
  return $fetch;
}

function find_value($result, $value) { // find a value in a array of sql results.
    foreach ($result as $key => $line) {
        foreach ($line as $data) {
            if ($value == $data) {
                return $key;
            }
        }
    }
    return false;
}




 ?>
