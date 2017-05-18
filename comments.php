<?php
include("controller/SQL/FUNCTIONS/connect.php");
function comments($bdd,$like){
  $query = "SELECT * FROM comments WHERE aliment_id_aliment LIKE \"$like\"";
  $result = mysqli_query($bdd,$query) or die ("Failure");
  $output = [];
  while ($select = mysqli_fetch_assoc($result)) {
      $output [] = $select;
    }
    return $output;
}
function add_comments($bdd,$text,$id,$id_user){
  $query = "INSERT INTO comments (id,aliment_id_aliment,text_comment,user_id_user)
  VALUES (NULL,\"$id\",\"$text\",$id_user);";
  $result = mysqli_query($bdd,$query) or die ("Failure");

}
function add_note($bdd,$note,$id,$id_user){
  $query = "INSERT INTO notes (id,aliment_id_aliment,note,user_id_user)
  VALUES (NULL,\"$id\",$note,$id_user);";
  $result = mysqli_query($bdd,$query) or die ("Failure");

}
function notes($bdd,$like){
  $query = "SELECT AVG (note) FROM notes WHERE aliment_id_aliment LIKE \"$like\"";
  $result = mysqli_query($bdd,$query) or die ("Failure");
  $select = mysqli_fetch_assoc($result);
   return $select;
}
?>
