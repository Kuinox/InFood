<?php
 session_start();
include("connect.php");
include("connection.html");
if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($bdd,$_POST['email']);
	$options = [
				'salt' => 'ceciestunmotdepassetreslong',
				'cost' => 12
			];
	$mm=password_hash($_POST["pass"], PASSWORD_BCRYPT, $options);
	$pass = mysqli_real_escape_string($bdd,$mm);
	echo$pass;
	$sel_user = "select * from user where email='$email' AND password='$pass'";
	// $nom="select pseudo from user where email='$email'";
	$ess = mysqli_query($bdd, "select pseudo from user where email='$email'");
	$_SESSION['nom']=$ess;
	echo"ess est $ess";
	$run_user = mysqli_query($bdd, $sel_user);
	$check_user = mysqli_num_rows($run_user);
	// echo"$check_user";
	if($check_user>0){
		$_SESSION['email']=$email;
		// header('Location:/INFOOD/user.php');
		echo"rendre header";
	}
	else {
		echo "<script>alert('Email or password is not correct, try again!')</script>";
		}
}
?>
