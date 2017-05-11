<?php
 session_start();
include("controller/SQL/FUNCTIONS/connect.php");
include("connection.html");
if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($bdd,$_POST['email']);
	// $options = [
				// 'salt' => 'ceciestunmotdepassetreslong',
				// 'cost' => 12
			// ];
<<<<<<< HEAD
			$mm=hash('sha256',$_POST["pass"]);
/*crypt($_POST["pass"],'rl');*/
=======
	$mm=crypt($_POST["pass"],'rl');
>>>>>>> 4204bca629a989f61c630444a62fc780ef5ca141
	//*******
	// Récupération du hash, on laisse le salt se générer automatiquement
// $hash = crypt($password);
	//****
	$pass = mysqli_real_escape_string($bdd,$mm);
	echo$pass;
	$sel_user = "select * from user where email='$email' AND password='$mm'";
	// $nom="select pseudo from user where email='$email'";
<<<<<<< HEAD
	/*$ess = mysqli_query($bdd, "select pseudo from user where email='$email'");
	$_SESSION['pseudo']=$ess;*/
	$pseu = mysqli_real_escape_string($bdd,"select pseudo from user where email='$email'");
=======
	$ess = mysqli_query($bdd, "select pseudo from user where email='$email'");
	$_SESSION['name']=$ess;
>>>>>>> 4204bca629a989f61c630444a62fc780ef5ca141
	$run_user = mysqli_query($bdd, $sel_user);
	$check_user = mysqli_num_rows($run_user);
	// echo"$check_user";
	if($check_user>0){
		$_SESSION['email']=$email;
		header('Location:/INFOOD/');
		// echo"rendre header";
	}
	else {
		echo "<script>alert('Email or password is not correct, try again!')</script>";
		}
}
?>
