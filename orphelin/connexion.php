<?php
session_start();
$_SESSION['panier']=[];

if (empty($_SESSION['panier'])){
	$_SESSION['panier'] = [];
}
if(isset($_POST['formconnexion'])){
	include_once("controller/SQL/FUNCTIONS/connect.php");

	$username=strip_tags($_POST['nom']);
	// $options = [
	// 'cost' => 12,
	// ];
	// $mm=password_hash($_POST["pwd"], PASSWORD_BCRYPT, $options);
	// $password=strip_tags($mm);
	$password=($_POST["pwd"]);
	$sql="SELECT id_user, pseudo, password FROM user WHERE $username='pseudo'";
	$query =mysqli_query($bdd,$sql);
	if($query)
	{
		$row=mysqli_fetch_row($query);
		$userId = $row[0];
		$dbUsername = $row[1];
		$dbPassword = $row[2];
		echo"$userId <br>";
		echo"$dbUsername <br>";
		echo"$dbPassword <br>";
	}
	if ($username==$dbUsername && $password==$dbPassword)
	{
		$_SESSION['pseudo'] =$username;
		$_SESSION['id_user'] =$userId;
		header('Location:/INFOOD/user.php');
	}
	else
	{
		echo"incorrect password";
	}
}
?>
<form method="POST" action="connexion.php">
		<table>
			<tr>
				<td>Nom :</td>
				<td><input type="text" plceholder="nom" name="nom"/></td>
			</tr>
			<tr>
				<td>Mot de Passe :</td>
				<td><input type="password" plceholder="pwd" name="pwd"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="formconnexion" value="Connexion"/></td>
			</tr>
		</table>
	</form>