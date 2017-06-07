<?php
 function updateUser(PDO $bdd)
{
    //modifier les donners par nulle
	$prep = $bdd->prepare("UPDATE user SET pseudo=? password=? email=? height=? weight=? WHERE id_user = ?");
    $prep->execute(array($_SESSION['pseudo'], hash("sha256", $_SESSION['password']), $_SESSION['email'], $_SESSION['height'], $_SESSION['weight'], $_SESSION['id_user']));
}
?>
