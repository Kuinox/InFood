<?php
 session_start();
<<<<<<< HEAD
include("controller/SQL/FUNCTIONS/connect.php");
=======
include("./controller/SQL/FUNCTIONS/connect.php");
>>>>>>> bee4044... j'ai changer
include("connection.html");
if(isset($_POST['login']))
{
	$email = mysqli_real_escape_string($bdd,$_POST['email']);
	$mm=hash('sha256',$_POST["pass"]);
	$pass = mysqli_real_escape_string($bdd,$mm);
	$sel_user = "select * from user where email='$email' AND password='$mm'";
	$run_user = mysqli_query($bdd, $sel_user);
	$check_user = mysqli_num_rows($run_user);
	if($check_user>0)
	{
		$_SESSION['email']=$email;
		$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');
		$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like '$email'");
		while($data = $requete->fetch())
		{
			// echo'<h2>'.$data['pseudo'].'</h2><br>';
			$_SESSION['name']=$data['pseudo'];
			$name=$_SESSION['name'];
			echo"rendre header";		
			echo "<script>alert('Bonjour $name')</script>";	
			header('Location:/INFOOD/user.php');

		}
	}
	else 
	{
		echo "<script>alert('Email ou motde passe est faux, réessayer!')</script>";
	}
}
?>
