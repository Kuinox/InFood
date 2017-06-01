<?php
if(isset ($_SESSION['user']['pseudo'])){
    echo '<form action="" method="POST">
        <input type="hidden" name="action" value="voter">
        Noter : <input type="text" name="vote" size="2"/>
        <input type="submit" name="button" value="Envoyer"/>
        </form>';
    echo '<br><form action="" method="POST">
        <input type="hidden" name="action" value="commenter">
        Commenter : <input type="text" name="comment" size="100"/>
        <input type="submit" name="button" value="Envoyer"/>
        </form><br>';
}else{
    echo "<br>Connectez vous pour noter ou commenter l'aliment.";
}
?>
