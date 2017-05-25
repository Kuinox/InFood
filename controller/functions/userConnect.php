<?php
session_start();
include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
$login = $_POST['login'];//protège les chars pour l'utiliser  dans une requête SQL
$password=hash('sha256',$_POST["password"]);//hash mot de passe
$query = "select * from user where password= ? AND (email= ? OR pseudo= ?)";
$rep = $bdd->prepare($query);
$prep->exec(array($password, $login, $login)) or die ("Erreur BDD");
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
