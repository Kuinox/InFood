<?php
$conn=mysqli_connect('localhost','root','','inscription')or die(mysqli_error());
if(isset($_POST['forminscription'])){
	if(empty($_POST['pre']))
	{
		echo"prenom est vide";
	}
	elseif(!empty($_POST['pre']))
	{	
		echo"not empty";
		$t=[];
		$t=$_POST['pre'];
		echo"<br>"." en  $t";
		$s=count($_POST['pre']);
		$i=0;
		echo"<br>"."le numero est $s";
		for($i=0;$i<$s;$i++)
		{
			echo" boucle for";
			echo"<br>"."le td[i] est $t[$i]";
			if($t[$i]== "é")
			{
				echo "$t[$i]";
				echo"tu peut pas mettre les é,è";
			}
		}
	}
	elseif(empty($_POST["nom"]))
	{
		echo"nom est vide";
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
		setcookie("pre", $_POST["pre"], time()+3600*12);
		setcookie("eml", $_POST["eml"], time()+3600*12);
		setcookie("pwd", $_POST["pwd"], time()+3600*12);
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
				<td>Prenom :</td>
				<td><input type="text" name="pre"/></td>
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