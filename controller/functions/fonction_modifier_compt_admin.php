<?php
 function updateUser(PDO $bdd)
{
    //modifier les donners par null
	$prep = $bdd->prepare("UPDATE user SET pseudo=?, password=?, email=?, height=?, weight=? WHERE id_user = ?");
    $prep->execute(array($_SESSION['user2']['pseudo'], $_SESSION['user2']['password'], $_SESSION['user2']['email'], $_SESSION['user2']['height'], $_SESSION['user2']['weight'], $_SESSION['user2']['id_user']));
}
?>
