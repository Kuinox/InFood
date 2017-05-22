<?php
session_start();
include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
$login = $_POST['password'];
$email = mysqli_real_escape_string($bdd,$_POST['login']);//protège les chars pour l'utiliser  dans une requête SQL
$password=hash('sha256',$_POST["password"]);//hash mot de passe
$query = "select * from user where password='$password' AND (email='$login' OR pseudo='$login')";
$result = mysqli_query($bdd, $query) or die("Erreur BDD");//recherche dans bdd email et mot de passe
if(mysqli_num_rows($result)>0) {//s'il existe mot de passe et email -> connexion réussi
	$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');//nouvelle connexion à la base (necessaire)
	$requete = $bdd->query("SELECT * FROM user WHERE email like '$login' OR pseudo='$login'");//recherche dans la bdd sur le login
	while($data = $requete->fetch(PDO::FETCH_ASSOC)) {//Récupère la ligne suivante d'un jeu de résultats PDO
		$_SESSION['user']= $data;
		echo "sucess";
    }

} else { //si le mot de passe et email n'existe pas -> connexion échoué
	echo "wrong"; //affiche alerte
}

?>
