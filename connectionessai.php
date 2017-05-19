<?php
//ouverture session
session_start();

//connection au bdd
include("controller/SQL/FUNCTIONS/connect.php");

//affichage html
include("connection.html");
if(isset($_POST['login']))
{
	//protège les chars pour l'utiliser  dans une requête SQL
	$email = mysqli_real_escape_string($bdd,$_POST['email']);

	//chiffrer mot de passe
	$mm=hash('sha256',$_POST["pass"]);

	//protège les chars pour l'utiliser  dans une requête SQL
	$pass = mysqli_real_escape_string($bdd,$mm);

	//recherche dans bdd email et mot de passe
	$sel_user = "select * from user where email='$email' AND password='$mm'";
	$run_user = mysqli_query($bdd, $sel_user);

	//recherche le nombre de fois le email et mot de passe existe
	$check_user = mysqli_num_rows($run_user);

	//s'il existe mot de passe et email
	//connection réussi
	if($check_user>0)
	{
		//nouvelle connection à la base (necessiare)
		$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');

		//recherche dans la bdd sur le nom
		$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like '$email'");

		//Récupère la ligne suivante d'un jeu de résultats PDO
		while($data = $requete->fetch())
		{
			// echo'<h2>'.$data['pseudo'].'</h2><br>';

			//mettre le nom dans une session
			$_SESSION['nom']=$data['pseudo'];
			$name=$_SESSION['nom'];

			// affichage
			// echo "<script>alert('Bonjour $name')</script>";

			//rediriger vers user
			header('Location:./user.php');
		}
		//Panier
			$_SESSION['panier']=[];
		//Panier
	}
	//si le mot de passe et email n'existe pas.
	//connection échouer
	else
	{
		//affiche alert
		echo "<script>alert('Email ou mot de passe est faux, réessayer!')</script>";
	}
}
?>
<a href="./">accuiel</a>
