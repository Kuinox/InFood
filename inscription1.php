<?php
include("controller/SQL/FUNCTIONS/connect.php");
session_start();
$html = include("inscriptionvu.html");
if(isset($_POST['forminscription'])){
	//verifier si nom weight height email mot de passe vident ou non
	if(empty($_POST["nom"]))
	{
		echo"nom est vide";
	}
	elseif(empty($_POST["weight"]))
	{
		echo"poid est vide";
	}
	elseif(empty($_POST["height"]))
	{
		echo"taille est vide";
	}
	elseif(empty($_POST["eml"]))
	{
		echo "Email est vide";
	}
	elseif(empty($_POST["pwd"]))
	{
		echo "Mot de passe est vide";
	}
	else
	{
		//chiffrer le mot de passe 
		$mm=hash('sha256',$_POST["pwd"]);
		
		//metrre les identifiants dans des sessions
		$_SESSION['nom'] = $_POST["nom"];
		$_SESSION['eml'] = $_POST["eml"];
		$_SESSION['pwd'] = $mm;
		$_SESSION['height'] = $_POST["height"];
		$_SESSION['weight'] = $_POST["weight"];
		
		$nom=$_POST["nom"];
		$eml=$_POST["eml"];
		$pwd=$mm;
		$weight=$_POST["height"];
		$height=$_POST["weight"];
		// echo"<br>$nom<br>$eml<br>$mm<br>$height<br>$weight<br>";
		$mailchek=$eml;
		// echo $eml;
		$result = mysqli_query($bdd, "SELECT * FROM user WHERE email like '$mailchek'");
		$row_cnt = mysqli_num_rows($result);
		mysqli_free_result($result);

		if($row_cnt != 0) {
			echo"erreur mail deja utiliser <br>";
		}
		elseif($row_cnt == 0)
		{
			$req="INSERT INTO user (pseudo, password, email, height, weight) values ('$nom','$mm','$eml','$height','$weight')";
			$res=mysqli_query($bdd,$req);
			// echo "<br>remettre redirection <br>";
			header('Location:/INFOOD/inscriptionreussie.php');
		}
	}
}

?>
