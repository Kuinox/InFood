<?php
  session_start();
include("connect.php");
$html = include("inscriptionvu.html");
if(isset($_POST['forminscription'])){
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
		// $options = [
			// 'salt' => 'ceciestunmotdepassetreslong',
			// 'cost' => 12
		// ];
		// $mm=password_hash($_POST["pwd"], PASSWORD_BCRYPT, $options);
			$mm=crypt($_POST["pass"],'rl');
		echo $mm;
		// setcookie("nom", $_POST["nom"], time()+3600*12);
		// setcookie("eml", $_POST["eml"], time()+3600*12);
		// setcookie("pwd", $mm, time()+3600*12);
		// setcookie("height", $_POST["height"], time()+3600*12);
		// setcookie("weight", $_POST["weight"], time()+3600*12);
		// header('Location:/INFOOD/inscription.php');
		// $nom=$_COOKIE["nom"];
		// $eml=$_COOKIE["eml"];
		// $pwd=$_COOKIE["pwd"];
		// $weight=$_COOKIE["weight"];
		// $height=$_COOKIE["height"];
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
		echo"<br>$nom<br>$eml<br>$pwd<br>$height<br>$weight<br>";
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
			$req="INSERT INTO user (pseudo, password, email, height, weight) values ('$nom','$pwd','$eml','$height','$weight')";
			$res=mysqli_query($bdd,$req);
			echo "<br>remettre redirection <br>";
			header('Location:/INFOOD/inscriptionreussie.php');
		}
	}
	// echo "$html";
}

?>
