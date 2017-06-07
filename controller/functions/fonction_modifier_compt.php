<?php
 function updateUser(PDO $bdd)
{
    //modifier les donners par null
	$prep = $bdd->prepare("UPDATE user SET pseudo=?, password=?, email=?, height=?, weight=? WHERE id_user = ?");
    $prep->execute(array($_SESSION['user']['pseudo'], $_SESSION['user']['password'], $_SESSION['user']['email'], $_SESSION['user']['height'], $_SESSION['user']['weight'], $_SESSION['user']['id_user']));
}
?>
