<?php
function deletComment(PDO $bdd,$id_comment)
{
      $query = "DELETE FROM comments WHERE `id` LIKE ?";
      $prep = $bdd->prepare($query);
      $prep->execute(array($id_comment));
  }
?>
