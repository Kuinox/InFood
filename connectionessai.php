<?php
include("connect.php");
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
$run_user = mysqli_query($bdd, $sel_user);
$check_user = mysqli_num_rows($run_user);
// echo"$check_user";
if($check_user>0){
$_SESSION['email']=$email;
header('Location:/INFOOD/user.php');
}
else {
echo "<script>alert('Email or password is not correct, try again!')</script>";
}
}
?>
<?php session_start();?>
<html>
	<head>
		<title>User Login</title>
	</head>
	<body>
		<form action="connectionessai.php" method="post">
			<table width="500" align="center" bgcolor="skyblue">
				<tr align="center">
					<td colspan="3"><h2>User Login</h2></td>
				</tr>
				<tr>
					<td align="right">
						<b>Email</b>
					</td>
					<td>
						<input type="text" name="email" required="required"/>
					</td>
				</tr>
				<tr>
					<td align="right">
						<b>Password:</b>
					</td>
					<td>
						<input type="password" name="pass" required="required">
					</td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<input type="submit" name="login" value="Login"/>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>