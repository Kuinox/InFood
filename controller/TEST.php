<?php
function displayComents()
{
  include("SQL/FUNCTIONS/comments.php");
  include("SQL/FUNCTIONS/connect.php");

<<<<<<< HEAD
    if(isset ($_SESSION['user']['pseudo'])){
    	echo '<p>Noter<form action="../controller/voter.php" method="POST">
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
=======
if(isset ($_SESSION['user']['pseudo'])){
	echo '<p>Noter<form action="./controller/voter.php" method="POST">
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
>>>>>>> feature/denis

    	    $chaine = implode(";", $value);
            $array = explode (";",$chaine);
    		//$result = mysqli_query($bdd,"SELECT pseudo FROM user JOIN comments WHERE aliment_id_aliment LIKE \"$like\" AND user_id_user LIKE id_user ;");
            $prep = $bdd->prepare("SELECT pseudo FROM user WHERE id_user = ?");
            $prep->execute(array($array[4]));
    		$select = $prep->fetch(PDO::FETCH_ASSOC);
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
    	echo"<br>not set ";//TODO DAFUK?
    }
}




?>
