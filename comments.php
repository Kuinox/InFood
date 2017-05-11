<?php
include("controller/SQL/FUNCTIONS/connect.php");
function comments($bdd,$like){
  $query = "SELECT text_comment FROM comments WHERE aliment_id_aliment LIKE \"$like\"";
  $result = mysqli_query($bdd,$query) or die ("Failure");
  $output = [];
  while ($select = mysqli_fetch_assoc($result)) {
      $output [] = $select;
    }
    return $output;
}
function add_comments($bdd,$text,$id){
  $query = "INSERT INTO comments VALUES (\"$id\",\"$text\",22/08/2017,1,NULL)";
  $result = mysqli_query($bdd,$query) or die ("Failure");

}
?>
