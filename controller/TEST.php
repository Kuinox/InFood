<?php
function displayComents()
{
  include("SQL/FUNCTIONS/comments.php");
  include("SQL/FUNCTIONS/connect.php");

    if(isset ($_SESSION['user']['pseudo'])){
    	echo '<form action="../controller/voter.php" method="POST">
            Noter : <input type="text" name="vote" size="2"/>
            <input type="submit" name="button" value="Envoyer"/>
            </form>';
    	echo '<br><form action="controller/ajouter_comment.php" method="POST">
            Commenter : <input type="text" name="comment" size="100"/>
            <input type="submit" name="button" value="Envoyer"/>
            </form><br>';
      $_SESSION['id'] = $_GET['id'];
      $like = $_SESSION['id'];
    	$com = comments($bdd,"$like");
    	echo "<br>Commentaire :";
      echo "<table>";
    	foreach ($com as $key => $value) {
            $prep = $bdd->prepare("SELECT pseudo FROM user WHERE id_user = ?");
            $prep->execute(array($value['user_id_user']));
    		$select = $prep->fetch(PDO::FETCH_ASSOC);
    		$comments = implode(";", $select);
            echo "<tr><td>";
            echo "pseudo : </td><td>";
    	    echo $comments;
            echo "</td></tr><tr><td>";
    	    echo $value['text_comment'];
            echo "</td></tr>";
    	}
      echo "</table>";
    }else{
    	echo"<br>pas connectée ";//TODO DAFUK?
    }
}




?>
