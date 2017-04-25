<?php
include("connect.php");
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
		$options = [
			'cost' => 12,
		];
		$mm=password_hash($_POST["pwd"], PASSWORD_BCRYPT, $options);
		setcookie("nom", $_POST["nom"], time()+3600*12);
		setcookie("eml", $_POST["eml"], time()+3600*12);
		setcookie("pwd", $mm, time()+3600*12);
		// setcookie("pwd", $m, time()+3600*12);
		setcookie("height", $_POST["height"], time()+3600*12);
		setcookie("weight", $_POST["weight"], time()+3600*12);
		header('Location:/INFOOD/inscription.php');
	}
}
$html=include("inscriptionvu.html");
echo"$html";
?>
