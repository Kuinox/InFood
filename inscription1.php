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
		setcookie("nom", $_POST["nom"], time()+3600*12);
		setcookie("eml", $_POST["eml"], time()+3600*12);
		setcookie("pwd", $_POST["pwd"], time()+3600*12);
		setcookie("height", $_POST["height"], time()+3600*12);
		setcookie("weight", $_POST["weight"], time()+3600*12);
		header('Location:/INFOOD/inscription.php');
	}
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
	</head>
	<body>
	<form method="POST" action="inscription1.php">
		<table>		
			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom"/></td>
			</tr>
			<tr>
				<td>poid :</td>
				<td><input type="text" name="weight"/></td>
			</tr>
			<tr>
				<td>taille en centimetre :</td>
				<td><input type="text" name="height"/></td>
			</tr>
			<tr>
				<td>Mail :</td>
				<td><input type="email" name="eml"/></td>
			</tr>
			<tr>
				<td>Mot de Passe :</td>
				<td><input type="password" name="pwd"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="forminscription" value="Inscription"/></td>
			</tr>
		</table>
	</form>
	</body>
</html>