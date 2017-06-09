<?php
if(isset($_POST['id_comment'])) {
  deletComment($bdd, $_POST['id_comment']);
}
displayComments(getUserComment($bdd, $id), true);

 ?>
