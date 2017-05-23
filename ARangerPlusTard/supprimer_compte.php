<?php

//ouvrir une connexion, tu remplaces par les accès
$mysqli = new mysqli("localhost", "user", "", "infood");

//tester la connexion
if (mysqli_connect_errno()) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

// effectuer l'operation
$mysqli->query("Delete from user where pseudo=toto");


?>
<form action="supprimer_compte.php" method="POST">
	<input type="text" name="" />
	<input/>
<form>