<?php
$dsn = "mysql:host=127.0.0.1; charset=utf8";
$user = "root";
$password = "";
try {
	$bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo 'Connexion Echoué : ' . $e->getMessage();
}

$result = $bdd->query("SHOW DATABASES LIKE 'infood'");
$db_exist = !empty($result->fetchAll());
$bdd = null;
 ?>
