<?php
session_start();
function displayComents()
{
  include("SQL/FUNCTIONS/comments.php");
  include("SQL/FUNCTIONS/connect.php");

if(isset ($_SESSION['user']['pseudo'])){
	echo '<form action="../controller/voter.php" method="POST">
        <input type="text" name="vote" size="2"/>
        <input type="submit" name="button" value="Envoyer"/>
        </form>';
	echo '<br><form action="controller/ajouter_comment.php" method="POST">
        <input type="text" name="comment" size="100"/>
        <input type="submit" name="button" value="Envoyer"/>
        </form><br>';
  $_SESSION['id'] = $_GET['id'];
  $_SESSION['type'] = $_GET['type'];
  $like = $_SESSION['id'];
	$com = comments($bdd,"$like");
	echo "<br>Commentaire :";
  echo "<table>";
	foreach ($com as $key => $value) {

		$chaine = implode(";", $value);
	  $array = explode (";",$chaine);
		//$result = mysqli_query($bdd,"SELECT pseudo FROM user JOIN comments WHERE aliment_id_aliment LIKE \"$like\" AND user_id_user LIKE id_user ;");
		$result = mysqli_query($bdd,"SELECT pseudo FROM user WHERE id_user = $array[4] ;");
		$select = mysqli_fetch_assoc($result);
		$comments = implode(";", $select);
    echo "<tr><td>";
    echo "pseudo : </td><td>";
		echo $comments;
    echo "</td></tr><tr><td>";
		echo $array[2];
    echo "</td></tr>";
	}
  echo "<table>";
  var_dump($com);
}else{
	echo"<br>not set ";
}
}




?>
