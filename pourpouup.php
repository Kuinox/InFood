<?php
session_start();

include("connect.php");
include("connection.html");

if(isset($_POST['login']))
{
	
	$email = mysqli_real_escape_string($bdd,$_POST['email']);			
	$mm=hash('sha256',$_POST["pass"]);
	$pass = mysqli_real_escape_string($bdd,$mm);
	$sel_user = "select * from user where email='$email' AND password='$mm'";
	$pseu = mysqli_real_escape_string($bdd,"select pseudo from user where email='$email'");
	$run_user = mysqli_query($bdd, $sel_user);
	$check_user = mysqli_num_rows($run_user);
	if($check_user>0)
	{
		$_SESSION['email']=$email;
		header('Location:/INFOOD/');
	}
	else 
	{
		echo "<script>alert('Email or password is not correct, try again!')</script>";
	}
}
?>
