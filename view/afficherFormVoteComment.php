<?php
if(isset ($_SESSION['user']['pseudo'])){
    echo '<br><br><br>
    <div class = "noter" >
    <p>Noter : </p>
    <form action = "" method="POST">
    <input type="hidden" name = "vote" value = "1">
    <input type="hidden" name = "action" value = "voter">
    <input type="image" src="'.$path.'ressources/star.svg" alt="Submit" height="30" width="30">
    </form>
    <form action = "" method="POST">
    <input type="hidden" name = "vote" value = "2">
    <input type="hidden" name = "action" value = "voter">
    <input type="image" src="'.$path.'ressources/star.svg" alt="Submit" height="30" width="30">
    </form>
    <form action = "" method="POST">
    <input type="hidden" name = "vote" value = "3">
    <input type="hidden" name = "action" value = "voter">
    <input type="image" src="'.$path.'ressources/star.svg" alt="Submit" height="30" width="30">
    </form>
    <form action = "" method="POST">
    <input type="hidden" name = "vote" value = "4">
    <input type="hidden" name = "action" value = "voter">
    <input type="image" src="'.$path.'ressources/star.svg" alt="Submit" height="30" width="30">
    </form>
    <form action = "" method="POST">
    <input type="hidden" name = "vote" value = "5">
    <input type="hidden" name = "action" value = "voter">
    <input type="image" src="'.$path.'ressources/star.svg" alt="Submit" height="30" width="30">
    </form>
    </div>';

    echo '<br><form action="" method="POST">
        <input type="hidden" name="action" value="commenter">
        Commenter : <input type="text" name="comment" size="100"/>
        <input type="submit" name="button" value="Envoyer"/>
        </form><br>';
}else{
    echo "<br>Connectez vous pour noter ou commenter l'aliment.";
}
?>
