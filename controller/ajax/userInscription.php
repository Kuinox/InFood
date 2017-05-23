<?php
session_start();
include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
$pseudo = mysqli_real_escape_string($bdd,$_POST['pseudo']);
$email = mysqli_real_escape_string($bdd,$_POST['email']);

$query = "SELECT * FROM user WHERE pseudo like '$pseudo'";
$results = mysqli_query($bdd, $query) or die("Erreur BDD");
if (mysqli_num_rows($results) > 0) {
	echo "pseudo_exist";
	exit();
}
mysqli_free_result($results);
$query = "SELECT * FROM user WHERE email like '$email'";
$results = mysqli_query($bdd, $query) or die("Erreur BDD");
if (mysqli_num_rows($results) > 0) {
	echo "email_exist";
	exit();
}
mysqli_free_result($results);
$password = hash('sha256',$_POST["password"]);//hash mot de passe

$query = "INSERT INTO user (pseudo, email, password) values ('$pseudo','$email','$password')";
$result = mysqli_query($bdd, $query) or die("Erreur BDD");//recherche dans bdd email et mot de passe
echo "sucess";

?>
